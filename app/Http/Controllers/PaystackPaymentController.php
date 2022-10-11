<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
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

    /**
     * Makes a request to Paystack to make a charge on the supplied phone number.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function initiateCharge(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            // TODO (Nana): Add an exists validation rule to the email and phone.
            // They must exist in the database before we proceed to charge.
            "email" => "required|email",
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
            )
        ]);

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Invalid request: " . join(",", $validator->errors()->all()),
            ], 400);
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

        // Make the request to Paystack with a timeout
        $paystackResponse = Http::withHeaders([
            "Authorization" => "Bearer " . env("PAYSTACK_SECRET_KEY")
        ])
            ->timeout(self::REQUEST_TIMEOUT_SECONDS)
            ->post(env("PAYSTACK_CHARGE_ENDPOINT"), [
                "email" => $request->email,
                "amount" => 100,
                "currency" => "GHS",
                "reference" => $reference,
                "mobile_money" => [
                    "phone" => $request->phone,
                    "provider" => $request->provider,
                ],
            ]);

        if ($paystackResponse->status() !== 200) {
            Log::error("paystack request to initiate a charge returned an non-200 status code\n", [
                "status_code" => $paystackResponse->status() . PHP_EOL,
                "paystack_response" => $paystackResponse . PHP_EOL,
                "request" => $request,
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "Error initiating payment. An internal error occurred"
            ]);
        }

        if ($paystackResponse->json("status") === false) {
            Log::error("paystack returned status = false: ", [
                "request" => $request,
                "paystackResponse" => $paystackResponse
            ]);

            return response()->json([
                "ok" => false,
                "msg" => "An internal error occurred. Payment cannot proceed"
            ]);
        }

        return response()->json([
            "ok" => true,
            "msg" => "Charge initiated successfully",
            "data" => $paystackResponse->json("data")["display_text"],
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

        return response()->json([
            "ok" => true,
            "msg" => "Please make the payment on your device",
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
        $payload = $request->json();

        // TODO (Nana): Handle other events later, like cancelled or failed. We can use background jobs to handle these later
        if (strtolower($payload->event) !== "charge.success") {
            return response()->json([
                "ok" => true,
                "msg" => "Acknowledged",
            ]);
        }


        return response()->json([
            "ok" => true,
            "msg" => "Request successful",
        ]);
    }
}
