<?php

namespace App\Http\Controllers;

use App\User;
use App\Common;
use App\CoinUsed;
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
        // $unUsedCoin = User::role('teacher')
        //     ->join('coin_used as cu', 'cu.user_id', '=', 'users.id')
        //     ->join('coin_used_items as cui', 'cui.coin_used_id', '=', 'cu.id')
        //     ->where('cui.coin_utilize_status', 0)
        //     ->whereDate('cu.created_at', '=', now()->subDays(14)->setTime(0, 0, 0)->toDateTimeString())
        //     ->get();

        // if (count($unUsedCoin) > 0) {
        //     foreach ($unUsedCoin as $key => $value) {
        //         $check = User::where('id', $value->used_against_id)
        //             ->with('verifications')
        //             ->whereHas('verifications', function ($query) {
        //                 $query->where('phone_verified', "0");
        //             })
        //             ->first()
        //             ->toArray();

        //         if ($check) {
        //             Common::Wallet($value->no_of_used_coins, 'add-coin', $value->user_id);
        //             Common::Wallet_Log($value->no_of_used_coins, 'Coin Refunded Against',  $value->coin_used_id, $value->user_id);
        //         }
        //     }
        // }

        return view('index');
    }


    public function referenceRegister(Request $request, $reference_id)
    {
        $referer_user_id =  explode("-", base64_decode($reference_id))[1];
        session(['referer_user_id' => $referer_user_id]);
        return redirect('/');
    }
}
