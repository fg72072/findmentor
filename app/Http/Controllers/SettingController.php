<?php

namespace App\Http\Controllers;

use App\User;
use App\Common;
use App\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    //    Important properties
    public $parentModel = User::class;

    public function index()
    {
        return view('setting');
    }

    public function phone()
    {
        return view('change-phone');
    }

    public function phoneVerified(Request $request)
    {
        $user_id = Auth::user()->id;
        $this->parentModel::find($user_id)->update(['phone' => $request->verified_no]);

        Common::UserAccountVerification(['phone_verified' => 1]);

        return redirect()->back();
    }

    public function username()
    {
        return view('change-name');
    }
    public function changeName(Request $request)
    {
        $user_id = Auth::user()->id;
        User::find($user_id)->update(['name' => $request->username]);

        Session::flash('success', 'Successfully Changed');

        return redirect()->back();
    }

    public function deleteAccount()
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);
        $user->delete();

        Session::flash('success', "Successfully Delete Your Account");
        return redirect()->route('home');
    }

    public function email()
    {
        return view('change-email');
    }
    public function changeEmail(Request $request)
    {
        $request->validate([
            'newEmail' => 'required|email|string|max:255'
        ]);

        $user = Auth::user();
        $user->email = $request['newEmail'];
        $user->email_verified_at = NULL;
        $user->save();

        Session::flash('success', 'Successfully Changed');

        return redirect()->back();
    }

    public function postVisibility($visibility)
    {
        $user_id = Auth::user()->id;
        UserVerification::where('user_id', $user_id)->update(['post_is_public' =>  $visibility]);

        Session::flash('success', 'Post Visibility Successfully Changed');
        return redirect()->back();
    }
    public function profile()
    {
        return view('profile-picture');
    }

    public function upload(Request $request)
    {
        $user_id = Auth::user()->id;
        $name    = '';
        $items   = $this->parentModel::find($user_id)->first();

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $name  = $this->getFileName($image);
            $path  = $this->getProfilePicPath();
            $image->move($path, $name);

            if ($items) {
                $this->unlinkProfilePic($items->profile);
            }
        }

        $this->parentModel::find($user_id)->update(['profile' => $name]);

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
}
