<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Common;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    // protected function redirectTo()
    // {
    //     $user_role = Auth::user()->roles->pluck('name')[0];

    //     if ($user_role == 'student') {
    //         return route('home');
    //     }

    //     return route('home');
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $verified = $data['role'] == 'student' ? Carbon::now()->toDateTimeString() : NULL;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => $verified,
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        session(['user_id' => $user->id]);

        if (session()->has('referer_user_id')) {
            $referer_user_id = session('referer_user_id');
            Common::Wallet(50, 'add-coin', $referer_user_id);
            Common::Wallet_Log(50,  'Reference User Register', 0, $referer_user_id);
            session()->forget('referer_user_id');
        }

        Common::UserAccountVerification(['is_account_verified_at' => $verified]);
        Common::Wallet();

        return $user;
    }
}
