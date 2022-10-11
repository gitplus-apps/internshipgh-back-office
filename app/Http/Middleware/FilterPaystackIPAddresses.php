<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FilterPaystackIPAddresses
{
    // List of known Paystack IP addresses that will make
    // requests to our webhook.
    private $knownPaystackIpAddresses = [
        "52.31.139.75",
        "52.49.173.169",
        "52.214.14.220"
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Make sure the IP of the incoming request is a known IP.
        if (!in_array($request->ip(), $this->knownPaystackIpAddresses)) {
            Log::warning("webhook request came from an invalid ip: " . $request->ip(), [
                "request" => $request,
                "ip" => $request->ip(),
            ]);
            return response()->json(["msg" => "Unauthorized"], 401);
        }
        return $next($request);
    }
}
