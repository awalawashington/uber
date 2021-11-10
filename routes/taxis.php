<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Rides\RideController;
use App\Http\Controllers\Taxis\Auth\LoginController;
use App\Http\Controllers\Taxis\Taxis\TaxiController;
use App\Http\Controllers\Taxis\Auth\RegisterController;
use App\Http\Controllers\Taxis\Auth\OtpVerificationController;


//Route group for authenticated users only
Route::group(['middleware' => ['auth:taxi']], function()
{
    Route::get('taxi-home',[TaxiController::class ,'index'])->name('taxi.home');
    Route::get('taxi-profile',[TaxiController::class ,'profile']);
    Route::put('accept-ride',[RideController::class ,'accept_ride']);
    Route::put('complete-ride',[RideController::class ,'complete_ride']);
    Route::put('taxi-personal-info',[TaxiController::class ,'taxi_personal_info_settings']);
    Route::put('taxi-info',[TaxiController::class ,'taxi_info_settings']);
    Route::put('taxi-change-password',[TaxiController::class ,'taxi_change_password']);
    Route::get('taxi-rides',[TaxiController::class ,'taxi_rides_view']);
    Route::get('taxi-logout',[LoginController::class ,'logout'])->name('taxi.logout');
});

Route::group(['middleware' => ['guest:taxi']], function()
{
    Route::get('taxi-login', [LoginController::class ,'login_view'])->name('taxi.login');
    Route::post('taxi-login',[LoginController::class ,'login']);

    Route::get('taxi-registration/step_1',[OtpVerificationController::class ,'request_otp_view'])->name('taxi.registration.step_1');
    Route::post('taxi-registration/step_1',[OtpVerificationController::class ,'request_otp']);
    Route::get('taxi-registration/step_2',[OtpVerificationController::class ,'verify_otp_view'])->name('taxi.registration.step_2');
    Route::post('taxi-registration/step_2',[OtpVerificationController::class ,'verify_otp']);
    Route::get('taxi-registration/step_3',[RegisterController::class ,'register_view'])->name('taxi.registration');
    Route::post('taxi-registration/step_3',[RegisterController::class ,'register']);
});


