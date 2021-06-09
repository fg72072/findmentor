<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class TutorProfileController extends Controller
{

    public function profile($id)
    {
        $teacher = User::role('teacher')->with('subject')
            ->with('experience')
            ->with('education')
            ->with('info')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->where('user_verifications.active_status', 1)
            ->first();


        if (!$teacher) {
            Session::flash('error', 'Not Found');
            return redirect()->back();
        }


        return view('tutor-profile')->with('data', $teacher);
    }
}
