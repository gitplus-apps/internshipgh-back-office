<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ValidatePaystackSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $paystackSignature = $request->header("x-paystack-signature");
        Log::info("paystack webhook signature: " . $paystackSignature);

        $calculateSignature = hash_hmac("sha256", $request->getContent(), env("PAYSTACK_SECRET_KEY"));
        Log::info("calculated hmac signature: " . $calculateSignature);

        if (!hash_equals($paystackSignature, $calculateSignature)) {
            Log::debug("webhook hmac signature mismatch", [
                "request" => $request,
                "paystack hmac signature" => $paystackSignature,
                "calculated hmac signature"=> $calculateSignature,
            ]);
            return response()->json(["msg" => "Bad request"], 401);
        }

        return $next($request);
    }
}