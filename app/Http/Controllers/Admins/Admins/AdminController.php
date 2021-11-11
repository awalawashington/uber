<?php

namespace App\Http\Controllers\Admins\Admins;

use App\Models\Taxi;
use App\Models\User;
use App\Models\Admin;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index(Type $var = null)
    {
        return view('/admins/admin/dashboard', [
            'users' => User::all(),
            'taxis' => Taxi::all()

        ]);
    }

    public function settings()
    {
        return view('/admins/admin/settings');
    }

    public function locations()
    {
        return view('/admins/admin/locations',[
            'locations' => Location::all()
        ]);
    }

    public function updatePassword(Request $request)
    {
        
        //current password
        //new password
        //password confirmation
        
        $this->validate($request,[
            'current_password' => ['required'],
            'password' => [
                'required', 
                'confirmed',
                Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
                 ]
            ]);

            auth()->user('admin')->update([
                "password" => bcrypt($request->password) 
            ]);

            return redirect()->route('admin.settings')->with('success','Password changed successfully');

    }


}
