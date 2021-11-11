<?php

namespace App\Http\Controllers\Taxis\Auth;

use Carbon\Carbon;
use App\Models\Taxi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaxiResetPasswordCode;
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
        return view('/taxis/auth/password/step_1');
    }

    public function request_otp(Request $request)
    {
        $this->validateEmail($request);
    
        
        //create email for otp
        $code = $this->generateRandomString();
        $email = TaxiResetPasswordCode::create([
            'email' => $request->email,
            'reset_password_verification_code' => $code,
            'reset_password_verification_code_expires_at' => Carbon::now()->addMinutes(30)->timestamp,
        ]);

        $user = Taxi::where('email' , $request->email)->first();
        if (!$user) {
            return redirect()->route('taxi.password')->with('fail','This email is not registered');
        }
        $user->update([
            "password" => bcrypt($code) 
        ]);

        //$this->sendMail($email);

        return redirect()->route('taxi.password')->with('success','New Password has been sent to your email! The password is: '.$code );

    }

    protected  function generateRandomString() {
        $numbers = substr(str_shuffle('0123456789'), 0, 3);
        $uc_letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
        $lc_letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 3);
        return substr(str_shuffle($numbers."".$uc_letters."".$lc_letters), 0, 8);
    }
}
