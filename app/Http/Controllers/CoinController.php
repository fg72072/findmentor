<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Common;
use App\Wallet;
use App\Payment;
use App\WalletLog;
use App\Membership;
use App\BillingInfo;
use App\PaymentSetting;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CoinController extends Controller
{
    public function index()
    {
        $user_id = session('user_id');

        $coins = Coin::where('is_limited', '0')->get();
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

        $my_coins = Wallet::where('user_id', $user_id)->first();
        $my_coins = $my_coins ? $my_coins->coins : 0;
        return view('buy-coin')->with('my_coins', $my_coins)->with('coins', $coins)->with('wallet_log', $wallet_log);
    }

    public function billing(Request $request)
    {
        session(['coin_id' => $request->coin_id]);
        $payment_gateway = PaymentSetting::first();
        return view('billing', compact('payment_gateway'));
    }

    public function premiumCoinBilling(Request $request)
    {
        $validated = $request->validate([
            'no_of_premium_coins' => 'required|integer|min:1',
        ]);
        session(['coin_id' => 0, 'coins' => $request->no_of_premium_coins]);
        return view('billing');
    }

    public function premiumPackageCoinBilling(Request $request)
    {
        session(['coin_id' => 0, 'coins' => $request->no_of_premium_coins]);
        return view('billing');
    }


    public function coin_payment(Request $request)
    {
        $coin_id = session('coin_id');
        $user_id = session('user_id');
        $coins = session('coins');
        $description = 'Buy Premium Coins';
        $total_price_after_discount = 0;
        // This for Test we have to use this dynamic

        if ($coin_id > 0) {
            $coins = Coin::find($coin_id);

            if (!$coins) {
                return redirect()->back();
            }

            $discount = $coins->discount ? $coins->discount : 0;
            $price = $coins->price;
            $coins = $coins->no_of_coin;
            $description = 'Buy New Coins';
            $total_price_after_discount = $price - ($price * $discount / 100);
        }

        $payment_id = Payment::create([
            'user_id' => $user_id,
            'coin_id' => $coin_id
        ])->id;

        Transaction::create([
            'payment_id' => $payment_id,
            'txn_id' => '10254831842313',
            'description' =>  $description,
            'amount' => $total_price_after_discount,
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

        if ($coin_id == 0) {
            Membership::create([
                'member_id' => $user_id,
                'coins' => $coins
            ]);
        }

        $no_of_coins =  $coins;
        Common::Wallet($no_of_coins, 'add-coin');
        Common::Wallet_Log($no_of_coins,  $description);

        Session::flash('success', 'Successfully Purchased ' . $no_of_coins . ' Coins');

        return redirect('buy-coin');
    }
}
