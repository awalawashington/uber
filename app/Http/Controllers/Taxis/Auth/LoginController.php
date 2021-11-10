<?php

namespace App\Http\Controllers\Taxis\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/taxi-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:taxi')->except('logout');
    }

    public function login_view()
    {
        return view('taxis/auth/login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::guard('taxi')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('taxi.home');
        }
        return redirect()->route('taxi.login')->with('fail','Incorrect credentials');
    }


    function taxiLogout(Request $request){
        Auth::guard('taxi')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('taxi.login');
    }
}
