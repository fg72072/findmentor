<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Wallet;

class UserHireController extends Controller
{
    public function contactUser(Request $request)
    {

        $user_id = session('user_id');
        $user_role = Auth::user()->roles->pluck('name')[0];

        $user_coins = Wallet::where('user_id', $user_id)->first()->coins;
        // echo $request->other_user_id;

        if ($user_role == 'student') {
            if ($user_coins >= 50) {
                $res = [
                    'status' => 'success',
                ];
            } else if ($user_coins < 50) {
                $res = [
                    'status' => 'error',
                    'message' => 'Buy More Coins'
                ];
            }
        }

        return response()->json($res);
    }
}
