<?php

namespace App\Http\Controllers\Taxis\Taxis;

use App\Models\Taxi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class TaxiController extends Controller
{
    public function index(Type $var = null)
    {
        return view('/taxis/taxi/dashboard');
    }

    public function profile()
    {
        return view('/taxis/taxi/profile');
    }

    public function taxi_rides_view(Type $var = null)
    {
        return view('/taxis/taxi/rides');
    }

    public function taxi_personal_info_settings(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|min:10|numeric',
            'email' => 'required|string|email|max:255|unique:taxis,email,'.auth('taxi')->user()->id,
        ]);

        $taxi = auth('taxi')->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);
        return redirect('taxi-profile')->with('status', 'Profile updated!');
    }

    public function taxi_info_settings(Request $request)
    {
        $this->validate($request, [
            'vehicle_registration_number' => 'required|string',
            'vehicle_type' => 'required|string',
            'vehicle_color' => 'required|string',
        ]);

        $taxi = auth('taxi')->user()->update([
            'vehicle_registration_number' => $request->vehicle_registration_number,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_color' => $request->vehicle_color,
        ]);
        return redirect('taxi-profile')->with('status', 'Profile updated!');
    }

    public function taxi_change_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required'],
            'password' => ['required', 'confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        ]);

        auth('taxi')->user()->update([
            "password" => bcrypt($request->password) 
        ]);
        return redirect('taxi-profile')->with('status', 'Profile updated!');
    }
}
