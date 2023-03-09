<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaystackPaymentController;
use App\Http\Controllers\API\RegistrationController as MobileRegistrationController;
use App\Http\Controllers\API\LoginController as MobileLoginController;
use App\Http\Controllers\Admin\InternController as AdminInternController;
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

/* Mobile api routes start */
Route::get('/schools', [MobileRegistrationController::class, 'schools']);
Route::get('/qualifications', [MobileRegistrationController::class, 'qualifications']);
Route::get('/levels', [MobileRegistrationController::class, 'levels']);
Route::get('/programs', [MobileRegistrationController::class, 'programs']);
Route::get('/regions', [MobileRegistrationController::class, 'regions']);
Route::get('/sectors', [MobileRegistrationController::class, 'sectors']);
Route::get('/districts', [MobileRegistrationController::class, 'districts']);
Route::get('/roles', [MobileRegistrationController::class, 'jobRoles']);
Route::get('/types', [MobileRegistrationController::class, 'internshipType']);

Route::post('registration', [MobileRegistrationController::class, 'registration']);
Route::post('login', [MobileLoginController::class, 'login']);
/* Mobile api routes end */


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



/* Admin Api routes start*/
    Route::prefix("admin")->group(function(){
        Route::get('interns', [AdminInternController::class, 'interns']); 
    });
/* Admin Api routes end */