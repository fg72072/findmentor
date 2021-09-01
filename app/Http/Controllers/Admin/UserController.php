<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Membership;
use App\Review;

class UserController extends Controller
{
    public function index()
    {

        $students = User::role('student')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select('users.*')
            ->where('user_verifications.active_status', 1)
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->get();

        $teachers = User::role('teacher')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select('users.*')
            ->where('user_verifications.active_status', 1)
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->get();

        $premiumTeachers = User::role('teacher')->join('memberships', 'users.id', '=', 'memberships.member_id')
            ->select('users.*')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->where('user_verifications.active_status', 1)
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->get();

        $blockedUsers = User::leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select('users.*')
            ->where('user_verifications.active_status', 0)
            ->get();
        $bad_review = Review::where('status', '1')->pluck('review_to_user_id')->toArray();
        return view('admin.users')
            ->with('teachers', $teachers)
            ->with('premiumTeachers', $premiumTeachers)
            ->with('students', $students)
            ->with('blockedUsers', $blockedUsers)
            ->with('bad_review', $bad_review);
    }
}
