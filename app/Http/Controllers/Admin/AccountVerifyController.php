<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AccountVerifyController extends Controller
{
    public function index()
    {

        $data = User::role('teacher')
            ->join('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->whereNull('user_verifications.is_account_verified_at')
            ->where('user_verifications.active_status', 1)
            ->get();

        return view('admin.account-verify')->with('data', $data);
    }

    public function show($id)
    {
        $teacher = User::role('teacher')->with('subject')
            ->with('experience')
            ->with('education')
            ->with('info')
            ->with('reviews')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->first();


        if (!$teacher) {
            Session::flash('error', 'Not Found');
            return redirect()->back();
        }

        return view('admin.teacher-detail')->with('data', $teacher);
    }


    public function approveAccount($id)
    {

        UserVerification::where('user_id', $id)->update([
            'is_account_verified_at' => Carbon::now()->toDateTimeString()
        ]);


        Session::flash('success', 'Successfully Approved');

        return redirect()->back();
    }


    public function rejectAccount($id)
    {

        UserVerification::where('user_id', $id)->update([
            'active_status' => 0
        ]);

        Session::flash('success', 'Account Rejected');

        return redirect()->back();
    }


    public function accountActivate($id)
    {

        UserVerification::where('user_id', $id)->update([
            'active_status' => 1
        ]);

        Session::flash('success', 'Account Activated');

        return redirect()->back();
    }
}
