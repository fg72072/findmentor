<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FindTutorController extends Controller
{

    public function search(Request $request)
    {
        $teacher = User::role('teacher')->with('subject')
            ->with('experience')
            ->with('education')
            ->with('info')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->where('user_verifications.active_status', 1);

        if (!empty($request->subject)) {
            $teacher = $teacher->whereHas('subject', function ($query) use ($request) {
                $query->where('subject', 'like', "%{$request->subject}%");
            });
        }
        if (!empty($request->location)) {

            $teacher = $teacher->whereHas('info', function ($query) use ($request) {
                $query->where('location', 'like', "%{$request->location}%");
            });
        }
        $teacher = $teacher->get();

        $params = [
            'subject' => $request->subject,
            'location' => $request->location,
        ];

        if (count($teacher) == 0) {
            Session::flash('error', 'No Record Found');
            return view('find-tutor')->with('data', $teacher)->with('params', $params);
        }

        return view('find-tutor')->with('data', $teacher)->with('params', $params);
    }
}
