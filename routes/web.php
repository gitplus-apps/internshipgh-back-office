<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RegistrationController;
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
    Route::post('/register_user',[RegistrationController::class,'store'])->name('registerUser')->withoutMiddleware('intern.profile');
    
    
    /* Admin Routes start*/
    /* :Todo add middleware to check for admin user type */
        Route::get('interns', [RouteController::class,'getInterns'])->name('admin.interns');
        Route::get('organizations',[RouteController::class, 'getOrganizations'])->name('admin.organizations');
        Route::get('schools', [RouteController::class, 'getSchools'])->name('admin.schools');
        Route::get('sectors', [RouteController::class, 'getSectors'])->name('admin.sectors');
        Route::get('programs', [RouteController::class, 'getPrograms'])->name('admin.programs');
        Route::get('job_roles', [RouteController::class, 'getJobRoles'])->name('admin.job_roles');
        Route::get('regions', [RouteController::class, 'getRegions'])->name('admin.regions');
        Route::get('districts', [RouteController::class, 'getDistricts'])->name('admin.districts');
        Route::get('users', [RouteController::class, 'getUsers'])->name('admin.users');
    
    /* Admin Routes end */
});


Auth::routes();




