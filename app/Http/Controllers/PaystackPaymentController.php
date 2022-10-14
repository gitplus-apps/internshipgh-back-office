<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;

class PaystackPaymentController extends Controller
{
    // The number of seconds to wait for a response
    // from paystack before timing out.
    private const REQUEST_TIMEOUT_SECONDS = 15;

    // List of valid mobile money provider values.
    // See: https://paystack.com/docs/payments/payment-channels/#provider-code
    private $validMobileMoneyProviders = [
        "mtn", "vod", "tgo",
    ];

    private $qual_code = [
        "certificate" => "1001",
        "diploma" => "1002",
        "degree" => "1003",
        "post_grad_diploma" => "1004",
        "masters" => "1005",
        "doctorate" => "1006"
    ];

    /**
     * Makes a request to Paystack to make a charge on the supplied phone number.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function initiateCharge(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|exists:tblintern,email",
            "phone" => "required|digits:10",
            "provider" => [
                "required",
                Rule::in($this->validMobileMoneyProviders),
            ]
        ], [
            "provider.in" => sprintf(
                "expected provider to be one of '%s' but got '%s'",
                join(",", $this->validMobileMoneyProviders),
                $request->provider
            ),
            "email.exists" => "No record found with this email: {$request->email}",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Invalid request: " . join(",", $validator->errors()->all()),
            ], 400);
        }

        $intern = Intern::where("email", $request->email)->where("deleted", "0")->get();

        // If the email should ever belong to more than one intern, then we have an error.
        if ($intern->count() !== 1) {
            Log::error("the following email: '{$request->email}' belongs to more than one intern", [
                "interns" => $intern->toArray(),
                "request" => $request->all(),
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "Cannot process payment. Kindly let us know if this continues. Send email to info@internship.com.gh"
            ], 500);
        }

        // At this point we can be sure we have only one intern. So we get the intern from the collection.
        $intern = $intern->first();

        try {
            // Generating random_bytes can throw an exception. We need to handle it.
            $reference = bin2hex(random_bytes(8));
        } catch (\Throwable $e) {
            Log::error("error generating a unique reference for a charge: " . $e->getMessage(), [
                "request" => $request->all(),
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred",
            ], 500);
        }

        $paystackResponse = Http::timeout(self::REQUEST_TIMEOUT_SECONDS)
            ->withHeaders([
                "Authorization" => "Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Content-Type" => "application/json",
            ])
            ->post(env("PAYSTACK_CHARGE_ENDPOINT"), [
                "email" => $request->email,
                "amount" => (float)$intern->qualification->amount * 100,
                "currency" => "GHS",
                "reference" => $reference,
                "mobile_money" => [
                    "phone" => App::environment("production") ? $request->phone : env("PAYSTACK_TEST_NUMBER"),
                    "provider" => App::environment("production") ? $request->provider : env("PAYSTACK_TEST_PROVIDER"),
                ],
            ]);

        $statusCode = $paystackResponse->status();
        if ($statusCode < 200 || $statusCode > 299) {
            Log::error("paystack request to initiate a charge returned an non-200 status code\n", [
                "status_code" => $statusCode,
                "paystackResponse" => $paystackResponse->body(),
                "request" => $request,
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "Error initiating payment. An internal error occurred"
            ], 500);
        }

        if ($paystackResponse->json("status") === false) {
            Log::error("intiating charge failed. paystack returned status = false: ", [
                "request" => $request,
                "paystackResponse" => $paystackResponse->body()
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred. Payment cannot proceed"
            ], 500);
        }

        try {
            DB::transaction(function() use ($intern, $reference) {
                $intern->payment_reference = $reference;
                $intern->save();

                Payment::create([
                   "transid" => bin2hex(random_bytes(8)),
                    "intern_code" => $intern->intern_code,
                    "payment_reference" => $reference,
                    "charged_date" => gmdate("Y-m-d H:i:s"),
                    "createdate" => gmdate("Y-m-d H:i:s"),
                    "createuser" => $intern->intern_code,
                ]);
            });

        } catch (\Throwable $e) {
           Log::error("error updating intern's payment reference: " . $e->getMessage(), [
                "intern" => $intern->toArray(),
                "request" => $request->all(),
           ]);
        }

        $jsonResponse = $paystackResponse->json();

        if (App::environment("production")) {
            return response()->json([
                "ok" => true,
                "msg" => "Charge initiated successfully",
                "data" => [
                    "displayText" => $jsonResponse["data"]["display_text"],
                    "reference" => $jsonResponse["data"]["reference"],
                    "status" => $jsonResponse["data"]["status"],
                ]
            ]);
        } else {
            return response()->json([
                "ok" => true,
                "msg" => "Charge initiated successfully",
                "data" => [
                    "displayText" => "Payment made successfully. This is just a test; no real money was paid",
                    "reference" => $jsonResponse["data"]["reference"],
                    "status" => "pay_offline",
                ]
            ]);
        }
    }

    /**
     * Submits the OTP sent to the user's phone.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function submitOTP(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "otp" => "required|numeric",
            "reference" => "required|exists:tblintern,payment_reference",
        ], [
            "reference.exists" => "Unknown reference",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => join(",", $validator->errors()->all()),
            ], 400);
        }

        $paystackResponse = Http::timeout(self::REQUEST_TIMEOUT_SECONDS)
            ->withHeaders([
                "Authorization" => "Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Content-Type" => "application/json",
            ])->post(env("PAYSTACK_SUBMIT_OTP_ENDPOINT"), [
                "otp" => $request->otp,
                "reference" => $request->reference,
            ]);

        $statusCode = $paystackResponse->status();
        if ($statusCode < 200 || $statusCode > 299) {
            Log::error("paystack request to submit OTP returned an non-2XX status code\n", [
                "status_code" => $statusCode,
                "paystackResponse" => $paystackResponse->body(),
                "request" => $request,
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "Error submitting OTP. An internal error occurred"
            ], 500);
        }

        if ($paystackResponse->json("status") === false) {
            Log::error("submitting paystack otp failed: paystack returned status = false", [
                "request" => $request->all(),
                "paystackResponse" => $paystackResponse->body(),
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred. Payment cannot proceed"
            ], 500);
        }

        $jsonResponse = $paystackResponse->json();

        return response()->json([
            "ok" => true,
            "msg" => "Request successful",
            "data" => [
                "displayText" => $jsonResponse["data"]["display_text"],
                "reference" => $request->reference,
            ],
        ]);
    }


    /**
     * This handles the webhook requests that Paystack will send to us.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        // TODO (Nana): Handle other events later, like cancelled or failed. We can use background jobs to handle these later
        if (strtolower($request->input('event')) !== "charge.success") {
            return response()->json([
                "ok" => true,
                "msg" => "Acknowledged",
                "data" => $request->getContent(),
            ]);
        }

        $reference = $request->input("data.reference");

        $intern = Intern::where("payment_reference", $reference)->get();
        if ($intern->count() === 0) {
            Log::error("webhook request came with unknown reference: {$reference}", [
                "request" => $request->all(),
            ]);

            // Although there is an error here, we need to return a '200 OK' status code.
            // If we return an error code, Paystack will retry the request again for 72hrs
            // expecting a 200 OK status code. There is no need for them to retry if the
            // reference does not exist in our db.
            return response()->json([
                "ok" => false,
                "msg" => "Unknown reference",
            ], 200);
        }

        if ($intern->count() > 1) {
            Log::error("webhook request came with a reference that belongs to more than one intern: {$reference}", [
                "reference" => $reference,
                "request" => $request->all(),
            ]);

            // Again we need to send a 200 OK for the same reasons as stated above
            return response()->json([
                "ok" => "false",
                "msg" => "Invalid reference",
            ], 200);
        }

        $payment = Payment::where("payment_reference", $reference)->get();
        if ($payment->count() === 0) {
            Log::error("reference from webhook request was not found in payment table: {$reference}", [
                "request" => $request->all(),
                "intern" => $intern->toArray(),
            ]);

            // We are returning 200 here for the same reasons stated above.
            return response()->json([
                "ok" => false,
                "msg" => "Invalid reference"
            ], 200);
        }

        if ($payment->count() > 1) {
            Log::error("webhook request came with a reference that has two records in the payment table", [
                "reference" => $reference,
                "request" => $request->all(),
            ]);

            // Again we need to send a 200 OK for the same reasons as stated above
            return response()->json([
                "ok" => "false",
                "msg" => "Invalid reference",
            ], 200);
        }

        DB::transaction(function() use ($intern, $payment) {
            $intern->update(["paid" => "1"]);
            $payment->update([
               "paid_date" => gmdate("Y-m-d H:i:s"),
            ]);
        });

        // TODO (Nana): Send SMS and email via a job

        return response()->json([
            "ok" => true,
            "msg" => "Request successful",
        ], 200);
    }
}
