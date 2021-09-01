<?php

namespace App\Http\Controllers;

use App\User;
use App\RequestTutor;
use App\Review;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorProfileController extends Controller
{

    public function profile($id)
    {
        $teacher = User::role('teacher')
            ->with('subject')
            ->with('experience')
            ->with('education')
            ->with('info')
            ->with('reviews')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select('users.*', 'user_verifications.is_account_verified_at')
            ->where('users.id', $id)
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->whereNotNull('users.email_verified_at')
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
    ///review report//
    public function reviewReport(Request $req)
    {
        $review = Review::where('id', $req->review_report)->where('review_to_user_id', Auth::user()->id)->update(['status' => '1']);
        if ($review) {
            Session::flash('success', 'Report has been send successfully');
        } else {
            Session::flash('error', 'You have no rights');
        }
        return redirect()->back();
    }
}
