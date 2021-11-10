<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Rides\RideController;
use App\Http\Controllers\Students\Auth\LoginController;
use App\Http\Controllers\Students\Auth\RegisterController;
use App\Http\Controllers\Students\Students\StudentController;
use App\Http\Controllers\Students\Auth\ResetPasswordController;
use App\Http\Controllers\Students\Auth\ForgotPasswordController;
use App\Http\Controllers\Students\Auth\OtpVerificationController;

//only logged in students
Route::group(['middleware' => ['auth']], function()
{
    Route::get('student-home',[StudentController::class ,'index'])->name('student.home');
    Route::post('request-ride',[RideController::class ,'create']);
    Route::get('student-profile',[StudentController::class ,'profile']);
    Route::put('student-personal-info',[StudentController::class ,'student_personal_info_settings']);
    Route::put('student-change-password',[StudentController::class ,'student_change_password']);
    Route::get('student-rides',[StudentController::class ,'student_rides_view']);
    Route::get('student-logout',[LoginController::class ,'logout'])->name('student.logout');
});

//only guest students
Route::group(['middleware' => ['guest']], function()
{
    Route::get('student-login', [LoginController::class ,'login_view'])->name('student.login');
    Route::post('student-login',[LoginController::class ,'login']);

    Route::get('student-registration/step_1',[OtpVerificationController::class ,'request_otp_view'])->name('student.registration.step_1');
    Route::post('student-registration/step_1',[OtpVerificationController::class ,'request_otp']);
    Route::get('student-registration/step_2',[OtpVerificationController::class ,'verify_otp_view'])->name('student.registration.step_2');
    Route::post('student-registration/step_2',[OtpVerificationController::class ,'verify_otp']);
    Route::get('student-registration/step_3',[RegisterController::class ,'register_view'])->name('student.registration');
    Route::post('student-registration/step_3',[RegisterController::class ,'register']);

    Route::get('student-reset-password/step_1',[ForgotPasswordController::class ,'request_otp_view']);
    Route::post('student-reset-password/step_1',[ForgotPasswordController::class ,'request_otp']);
    Route::get('student-reset-password/step_2',[ForgotPasswordController::class ,'verify_otp_view']);
    Route::post('student-reset-password/step_2',[ForgotPasswordController::class ,'verify_otp']);
    Route::get('student-reset-password/step_3',[ResetPasswordController::class ,'reset_password_view']);
    Route::post('student-reset-password/step_3',[ResetPasswordController::class ,'reset']);
});