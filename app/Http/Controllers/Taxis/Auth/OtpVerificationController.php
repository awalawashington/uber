<?php

namespace App\Http\Controllers\taxis\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaxiVerificationCode;
use App\Notifications\EmailVerification;

class OtpVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function request_otp_view()
    {
        return view('/taxis/auth/registration/step_1');
    }

    public function request_otp(Request $request)
    {
        //validate the email
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Taxis'],
            ]);

        
        //create email for otp
        $email = TaxiVerificationCode::create([
            'email' => $request->email,
            'email_verification_code' => $this->generateRandomString(),
            'email_verification_code_expires_at' => Carbon::now()->addMinutes(30)->timestamp,
        ]);

        //$this->sendMail($email);
        return redirect('taxi-registration/step_2')->with('taxi_email', $email);

    }

    private function sendMail(TaxiVerificationCode $email)
    {
        $verification_data = [
            'body' => "OTP Verification is ". $email->email_verification_code ,
            'text' => $email->email_verification_code,
            'url' => url('/'),
            'thankyou' => "You have 30minutes to verify"
        ];

        $email->notify(new EmailVerification($verification_data));
    }

    public function verify_otp_view()
    {
        if (!session('taxi_email')) {
            return redirect('taxi-registration/step_1');
        }
        return view('/taxis/auth/registration/step_2');
    }

    public function verify_otp(Request $request)
    {
        //validate the email
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Taxis'],
            ]);

        $email = TaxiVerificationCode::where('email' ,$request->email)->latest()->first();

        if (Carbon::now()->gt($email->email_verification_code_expires_at)) {
            return redirect()->route('taxi.registration.step_2')->with('fail','Verification Code expired');
        }
      
        if ($request->email_verification_code !== $email->email_verification_code) {
            return redirect()->route('taxi.registration.step_2')->with(['fail' =>'Incorrect Code', 'taxi_email' => $email]);
        }

        

        return redirect('taxi-registration/step_3')->with('taxi_email', $email->email);
    }

    

    

    public function register_view()
    {
        if (!session('taxi_email')) {
            return redirect('taxi-registration/step_1');
        }
        return view('/taxis/auth/registration/step_3');
    }

    protected  function generateRandomString() {
        $numbers = substr(str_shuffle('0123456789'), 0, 3);
        $uc_letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
        $lc_letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 3);
        return substr(str_shuffle($numbers."".$uc_letters."".$lc_letters), 0, 8);
    }


}
