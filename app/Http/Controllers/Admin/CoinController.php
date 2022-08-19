<?php

namespace App\Http\Controllers\Admin;

use App\Coin;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CoinController extends Controller
{
    public function index()
    {
        $coins = Coin::orderBy('created_at', 'asc')->get();

        return view('admin.coin')->with('coins', $coins);
    }

    public function store(Request $request)
    {
        Coin::updateOrCreate([
            'id' => $request->coin_id
        ], [
            'no_of_coin' => $request->no_of_coins,
            'discount' => $request->discount,
            'price' => $request->price,
        ]);

        Session::flash('success', 'Successfully Added');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $items = Coin::find($id);
        $items->deleted_by = Auth::user()->email;
        $items->delete();
        Session::flash('success', "Successfully Trashed");
        return redirect()->back();
    }
    public function coinSetting()
    {
        $countries = Country::get();
        return view('admin.coin-setting', compact('countries'));
    }
    public function coinDeduction(Request $req)
    {
        if ($req->country == '0') {
            $country = Country::where('status', '0')->update(['coins' => $req->no_of_coins]);
        } else if ($req->country != '0') {
            $country = Country::find($req->country);
            $country->status = '1';
            $country->coins = $req->no_of_coins;
            $country->save();
        }
        return redirect()->back();
    }
    public function coinDelete($id)
    {
        $countries = Country::where('status', '0')->first();
        $country = Country::find($id);
        $country->coins = $countries->coins;
        $country->status = '0';
        $country->save();
        return redirect()->back();
    }
}
