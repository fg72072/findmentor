<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Session::flash('error', 'Failed to create there is some issue');
        $user_id = session('user_id');

        $check_user_account_verified = NULL;

        if ($user_id) {
            $check_user_account_verified = User::where('users.id', $user_id)
                ->leftJoin('user_verifications as uv', 'uv.user_id', '=', 'users.id')
                ->first();
        }

        return view('index')->with('is_verified', $check_user_account_verified);
    }
}
