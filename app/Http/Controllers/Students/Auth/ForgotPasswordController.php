<?php

namespace App\Http\Controllers\Students\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserResetPasswordCode;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function request_otp_view(Type $var = null)
    {
        return view('/students/auth/password/step_1');
    }

    public function request_otp(Request $request)
    {
        $this->validateEmail($request);
    
        
        //create email for otp
        $email = UserResetPasswordCode::create([
            'email' => $request->email,
            'reset_password_verification_code' => $this->generateRandomString(),
            'reset_password_verification_code_expires_at' => Carbon::now()->addMinutes(30)->timestamp,
        ]);
        return redirect('/student-reset-password/step_2')->with('email', $email);

    }

    public function verify_otp_view()
    {
        if (!session('email')) {
            return redirect('/student-reset-password/step_1');
        }
        return view('/students/auth/password/step_2');
    }

    public function verify_otp(Request $request)
    {
        //validate the email
        $this->validate($request,[
            'email' => ['required'],
            ]);

        $email = UserResetPasswordCode::where('email' ,$request->email)->latest()->first();

        if (Carbon::now()->gt($email->reset_password_verification_code_expires_at)) {
            return "code expired";
        }
      
        if ($request->reset_password_verification_code !== $email->reset_password_verification_code) {
            return "invalid code";
        }

        return redirect('/student-reset-password/step_3')->with('email', $email);
    }

    protected  function generateRandomString() {
        $numbers = substr(str_shuffle('0123456789'), 0, 3);
        $uc_letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
        $lc_letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 3);
        return substr(str_shuffle($numbers."".$uc_letters."".$lc_letters), 0, 8);
    }
}
