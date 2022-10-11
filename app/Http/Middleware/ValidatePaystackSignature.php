<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        $requestPayload = $request->getContent();
        $calculateSignature = hash_hmac("sha256", $requestPayload, env("PAYSTACK_SECRET_KEY"));

        if (!hash_equals($paystackSignature, $calculateSignature)) {
            return response()->json(["msg" => "Bad request"], 401);
        }

        return $next($request);
    }
}
