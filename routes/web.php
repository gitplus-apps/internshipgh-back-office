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

Route::group(['middleware' => ['auth','intern.profile'] ], function(){
    Route::get('/', [RouteController::class, 'dashboard']);
    Route::get('/home', [RouteController::class, 'dashboard'])->name('home');
    Route::get('/add/profile', [RouteController::class, 'setProfile'])->name('profile')->withoutMiddleware('intern.profile');
});


Auth::routes();




