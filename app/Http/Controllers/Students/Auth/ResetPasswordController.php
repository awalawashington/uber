<?php

namespace App\Http\Controllers\Students\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function reset_password_view()
    {
        if (!session('email')) {
            return redirect('/student-reset-password/step_1');
        }
        return view('/students/auth/password/step_3');
    }

    public function reset(Request $request)
    {
        $user = User::where('email' , $request->email)->first();

        $user->update([
            "password" => bcrypt($request->password) 
        ]);

        return redirect('/student-login');
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/student-login';
}
