<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaystackPaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('intern_registration', [RegistrationController::class, 'store']);

Route::prefix("payments")->group(function () {
    Route::post("charge", [PaystackPaymentController::class, "initiateCharge"]);
    Route::post("submit_otp", [PaystackPaymentController::class, "submitOTP"]);
    Route::post('webhook', [PaystackPaymentController::class, "handleWebhook"])
        ->middleware([
            "paystack.filter.ips",
            "paystack.validate.signature",
        ]);
});
