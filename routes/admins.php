<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Admins\Auth\LoginController;
use App\Http\Controllers\Locations\LocationController;
use App\Http\Controllers\Admins\Admins\AdminController;
use App\Http\Controllers\Admins\Auth\RegisterController;
use App\Http\Controllers\Admins\Auth\OtpVerificationController;


//Route group for authenticated users only
Route::group(['middleware' => ['auth:admin']], function()
{
    Route::get('admin-home',[AdminController::class ,'index'])->name('admin.home');
    Route::post('location',[LocationController::class ,'create']);
});

Route::group(['middleware' => ['guest:admin']], function()
{
    Route::get('admin-login', [LoginController::class ,'login_view'])->name('admin.login');
    Route::post('admin-login',[LoginController::class ,'login']);

    Route::get('admin-registration',[RegisterController::class ,'register_view']);
    Route::post('admin-registration',[RegisterController::class ,'register']);
});


