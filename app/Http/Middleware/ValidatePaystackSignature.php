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
        $calculateSignature = hash_hmac("sha512", $request->getContent(), env("PAYSTACK_SECRET_KEY"));

        if (!hash_equals($paystackSignature, $calculateSignature)) {
            Log::debug("webhook hmac signature mismatch", [
                "request" => $request,
                "paystack hmac signature" => $paystackSignature,
                "calculated hmac signature"=> $calculateSignature,
            ]);
            return response()->json(["msg" => "Bad request"], 401);
        }

        Log::info("webhook successfully verified");
        return $next($request);
    }
}
