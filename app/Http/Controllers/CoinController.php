<?php

namespace App\Http\Controllers;

use App\Common;
use App\Wallet;
use App\Payment;
use App\WalletLog;
use App\BillingInfo;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CoinController extends Controller
{
    public function index()
    {
        $user_id = session('user_id');

        $coins = DB::table('coins')->get();
        $wallet_log = WalletLog::leftjoin('coin_used as cu', 'cu.id', '=', 'wallet_log.coin_used_id')
            ->leftjoin('coin_used_items as cui', 'cui.coin_used_id', '=', 'cu.id')
            ->leftjoin('users', 'cu.used_against_id', '=', 'users.id')
            ->leftjoin('request_tutors as rt', 'cui.requirement_id', '=', 'rt.id')
            ->select(
                'wallet_log.description',
                'wallet_log.user_id',
                'cui.requirement_id',
                'cu.used_against_id',
                'wallet_log.coin',
                'wallet_log.coin_used_id',
                'wallet_log.created_at',
                'users.name',
                'rt.id as requirement_id',
                'rt.location',
                'rt.subject'
            )
            ->orderBy('wallet_log.created_at', 'desc')
            ->where('wallet_log.user_id', $user_id)
            ->get();

        $my_coins = Wallet::where('user_id', $user_id)->first()->coins;

        return view('buy-coin')->with('my_coins', $my_coins)->with('coins', $coins)->with('wallet_log', $wallet_log);
    }

    public function billing(Request $request)
    {
        session(['coin_id' => $request->coin_id]);
        return view('billing');
    }


    public function coin_payment(Request $request)
    {
        $coin_id = session('coin_id');
        $user_id = session('user_id');
        $coins = DB::table('coins')->find($coin_id);

        $payment_id = Payment::create([
            'user_id' => $user_id,
            'coin_id' => $coin_id
        ])->id;

        Transaction::create([
            'payment_id' => $payment_id,
            'txn_id' => 'London to Paris',
            'description' => 'London to Paris',
            'amount' => 100,

        ]);

        BillingInfo::create([
            'payment_id' => $payment_id,
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'phone' =>  $request->phone,
            'address' =>  $request->address,
            'country' =>  $request->country,
            'state' =>  $request->state,
            'city' =>  $request->city,
            'postal_code' =>  $request->postal_code
        ]);

        $no_of_coins =  $coins->no_of_coin;
        Common::Wallet($no_of_coins, 'add-coin');
        Common::Wallet_Log($no_of_coins, 'New Coins Purchased');

        Session::flash('success', 'Successfully Purchased ' . $no_of_coins . ' Coins');

        return redirect('buy-coin');
    }
}
