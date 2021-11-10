<?php

use App\Http\Controllers\Locations\LocationController;
Route::get('/',function ()
{
    return view('welcome');
});
include('students.php');
include('taxis.php');
include('admins.php');

Route::get('travel-from-to',[LocationController::class ,'travelFromTo']);

