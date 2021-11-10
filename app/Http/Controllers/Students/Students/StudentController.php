<?php

namespace App\Http\Controllers\Students\Students;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    public function index(Type $var = null)
    {
        return view('/students/student/dashboard', ['locations' => Location::all()]);
    }

    public function profile()
    {
        return view('/students/student/profile');
    }

    public function student_rides_view(Type $var = null)
    {
        return view('/students/student/rides');
    }

    public function student_personal_info_settings(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|min:10|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
        ]);

        $student = auth()->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);
        return redirect('student-profile')->with('status', 'Profile updated!');
    }

    public function student_change_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required'],
            'password' => ['required', 'confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        ]);

        auth()->user()->update([
            "password" => bcrypt($request->password) 
        ]);
        return redirect('student-profile')->with('status', 'Profile updated!');
    }
}
