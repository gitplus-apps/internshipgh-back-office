<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
            "email.exists" => "No intern registered with this email: " . $request->email,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Invalid request: " . join(",", $validator->errors()->all()),
            ], 400);
        }

        $intern = Intern::where("email", $request->email)->where("deleted", "0");

        // If the email should ever belong to more than one intern, then we have an error.
        if ($intern->count() !== 1) {
            Log::error("the following email: '{$request->email}' belongs to more than one intern", [
                "interns" => $intern->get()->toArray(),
                "request" => $request->all(),
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "Cannot process payment. Kindly let us know if this continues. Send email to info@internship.com.gh"
            ]);
        }

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
            ]);
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
                    "phone" => $request->phone,
                    "provider" => $request->provider,
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
            ]);
        }

        if ($paystackResponse->json("status") === false) {
            Log::error("intiating charge failed. paystack returned status = false: ", [
                "request" => $request,
                "paystackResponse" => $paystackResponse->body()
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred. Payment cannot proceed"
            ]);
        }

        try {
            $intern->payment_reference = $reference;
            $intern->saveOrFail();
        } catch (\Throwable $e) {
           Log::error("error updating intern's payment reference: " . $e->getMessage(), [
                "intern" => $intern->get()->toArray(),
                "request" => $request->all(),
           ]);
        }

        $jsonResponse = $paystackResponse->json();
        return response()->json([
            "ok" => true,
            "msg" => "Charge initiated successfully",
            "data" => [
                "displayText" => $jsonResponse["data"]["display_text"],
                "reference" => $jsonResponse["data"]["reference"],
                "status" => $jsonResponse["data"]["status"],
            ]
        ]);
    }

    /**
     * Submits the OTP sent to the user's phone.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function submitOTP(Request $request): JsonResponse
    {
        // TODO (Nana): Make sure reference exists somewhere in the system
        $validator = Validator::make($request->all(), [
            "otp" => "required|numeric",
            "reference" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => join(",", $validator->errors()->all()),
            ]);
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
            ]);
        }

        if ($paystackResponse->json("status") === false) {
            Log::error("intiating charge failed. paystack returned status = false: ", [
                "request" => $request,
                "paystackResponse" => $paystackResponse->body(),
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred. Payment cannot proceed"
            ]);
        }

        if ($paystackResponse->json("status") === false) {
            Log::error("paystack returned status = false: ", [
                "request" => $request,
                "paystackResponse" => $paystackResponse->body(),
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred. Payment cannot proceed"
            ]);
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

        return response()->json([
            "ok" => true,
            "msg" => "Request successful",
            "request" => $request->all(),
        ]);
    }
}
