<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use App\PaymentSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin.setting');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back();
    }

    public function updateUsername(Request $request)
    {
        $user_id = Auth::user()->id;
        User::find($user_id)->update(['name' => $request->username]);

        return redirect()->back();
    }

    public function upload(Request $request)
    {
        $user_id = Auth::user()->id;
        $name    = '';
        $items   = User::find($user_id)->first();

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $name  = $this->getFileName($image);
            $path  = $this->getProfilePicPath();
            $image->move($path, $name);

            if ($items) {
                $this->unlinkProfilePic($items->profile);
            }
        }

        User::find($user_id)->update(['profile' => $name]);

        Session::flash('success', 'Successfully Changed');

        return redirect()->back();
    }

    private function getFileName($image)
    {
        return time() . '.' . str_replace(' ', '_', strtolower($image->getClientOriginalName()));
    }


    private function getProfilePicPath()
    {
        return public_path() . "/asset/profile/";
    }

    private function unlinkProfilePic($file)
    {

        $file_path = $this->getProfilePicPath();
        $file = $file_path . $file;

        if (file_exists($file)) {
            @unlink($file);
            return true;
        }

        return false;
    }
    public function paymentSetting()
    {
        $payment_gateway = PaymentSetting::first();
        return view('admin.payment-setting', compact('payment_gateway'));
    }
    public function updatePaymentSetting(Request $req)
    {
        $payment_gateway = PaymentSetting::find($req->id);
        $payment_gateway->paypal_key = $req->key;
        $payment_gateway->type = $req->type;
        $payment_gateway->save();
        return redirect()->back();
    }
}
