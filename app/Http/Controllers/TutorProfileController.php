<?php

namespace App\Http\Controllers;

use App\User;
use App\RequestTutor;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorProfileController extends Controller
{

    public function profile($id)
    {
        $teacher = User::role('teacher')->with('subject')
            ->with('experience')
            ->with('education')
            ->with('info')
            ->with('reviews')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->where('user_verifications.active_status', 1)
            ->first();


        if (!$teacher) {
            Session::flash('error', 'Not Found');
            return redirect()->back();
        }

        if (Auth::user() && Auth::user()->roles->pluck('name')[0] == 'student') {
            $user_id = session('user_id');

            $requirement = RequestTutor::where('student_id', $user_id)->get();

            return view('tutor-profile')->with('data', $teacher)->with('requirements', $requirement);
        }


        return view('tutor-profile')->with('data', $teacher);
    }




    public function createDescription(Request $request)
    {
        $user_id = session('user_id');
        Teacher::where('teacher_id', $user_id)->update(['description' => $request->description]);
        Session::flash('success', 'Successfully Added');
        return redirect()->back();
    }
}
