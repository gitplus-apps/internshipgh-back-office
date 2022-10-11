<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RouteController::class, 'homePage']);
Route::get('/contact', [RouteController::class, 'contactUs']);
Route::get('/about-us', [RouteController::class, 'aboutUs']);

Route::get('/services', [RouteController::class, 'services']
);

Route::get('/terms-of-use', [RouteController::class, 'termsOfUse']);

Route::get('/privacy', [RouteController::class, 'privacy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/registration', [RouteController::class, 'registration']);
