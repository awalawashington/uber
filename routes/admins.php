<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Admins\Auth\LoginController;
use App\Http\Controllers\Locations\LocationController;
use App\Http\Controllers\Admins\Admins\AdminController;
use App\Http\Controllers\Admins\Auth\RegisterController;
use App\Http\Controllers\Taxis\Auth\ForgotPasswordController;
use App\Http\Controllers\Admins\Auth\OtpVerificationController;


//Route group for authenticated users only
Route::group(['middleware' => ['auth:admin']], function()
{
    Route::get('admin-home',[AdminController::class ,'index'])->name('admin.dashboard');
    Route::get('admin-settings',[AdminController::class ,'settings'])->name('admin.settings');
    Route::get('admin-locations',[AdminController::class ,'locations'])->name('admin.locations');
    Route::post('location',[LocationController::class ,'create']);
    Route::post('/settings/password',[AdminController::class ,'updatePassword'])->name('admin.settings.password');

    Route::get('admin-logout',[LoginController::class ,'logout'])->name('admin.logout');
});

Route::group(['middleware' => ['guest:admin']], function()
{
    Route::get('admin-login', [LoginController::class ,'login_view'])->name('admin.login');
    Route::post('admin-login',[LoginController::class ,'login']);

    Route::get('admin-registration',[RegisterController::class ,'register_view']);
    Route::post('admin-registration',[RegisterController::class ,'register']);

    Route::get('taxi-reset-password/step_1',[ForgotPasswordController::class ,'request_otp_view'])->name('taxi.password');
    Route::post('taxi-reset-password/step_1',[ForgotPasswordController::class ,'request_otp']);
});


