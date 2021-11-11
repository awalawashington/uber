<?php

namespace App\Http\Controllers\Taxis\Auth;

use App\Models\Taxi;
use Illuminate\Support\Arr;
use App\Models\TaxiLocation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\TaxiVerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function register_view()
    {
        if (!session('taxi_email')) {
            return redirect('/taxi-registration/step_1');
        }
        return view('/taxis/auth/registration/step_3');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard('taxi')->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($user)
    {
        return Auth::guard($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|min:10|numeric|unique:taxis', 
            'email' => 'required|string|email|max:255|unique:taxis',
            'vehicle_registration_number' => 'required|string|unique:taxis',
            'vehicle_type' => 'required|string',
            'vehicle_color' => 'required|string',
            'password' => ['required', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ]
        ]);

        if ($validator->fails()) {
            $arr = Arr::flatten($data);
          
            session(['taxi_email' => $arr[1]]);
        }

        

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        TaxiVerificationCode::where('email' ,$data['email'])->delete();
        $taxi = Taxi::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'vehicle_registration_number' => $data['vehicle_registration_number'],
            'vehicle_type' => $data['vehicle_type'],
            'vehicle_color' => $data['vehicle_color'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        TaxiLocation::create([
            'taxi_id' => $taxi->id,
            'location_id' => 1
        ]);
        return $taxi;
    }
}
