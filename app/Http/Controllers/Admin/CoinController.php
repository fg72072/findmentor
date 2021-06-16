<?php

namespace App\Http\Controllers\Admin;

use App\Coin;
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
}
