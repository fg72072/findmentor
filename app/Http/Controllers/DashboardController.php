<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Common;
use App\Wallet;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    //  USER ID
    public $user_id = Auth::class;

    public function index()
    {
        $coins = Wallet::where('user_id', $this->user_id::user()->id)->first();
        return view('dashboard')->with('coins',$coins);
    }
}
