<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Common;
use Illuminate\Support\Facades\Auth;

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

        Common::UserAccountVerification(['phone_verified'=>1]);

        return redirect()->back();
    }

    public function profile(){
        return view('profile-picture');
    }

    public function upload(Request $request)
    {
        $user_id = Auth::user()->id;
        $name    = '';
        $items   = $this->parentModel::find($user_id)->first();

        if($request->hasFile('profile'))
        {
            $image = $request->file('profile');
            $name  = $this->getFileName($image);
            $path  = $this->getProfilePicPath();
            $image->move( $path, $name);

            if($items){
                $this->unlinkProfilePic($items->profile);
            }
        }

        $this->parentModel::find($user_id)->update(['profile' =>$name]);

        return redirect()->back();
    }



    private function getFileName($image){
        return time().'.'.str_replace(' ','_',strtolower($image->getClientOriginalName()) );
    }


    private function getProfilePicPath(){
        return public_path()."/asset/profile/";
    }


    private function unlinkProfilePic($file){

        $file_path = $this->getProfilePicPath();
        $file = $file_path.$file;

        if( file_exists($file) )
        {
           @unlink($file);
           return true;
        }

        return false;

    }



}
