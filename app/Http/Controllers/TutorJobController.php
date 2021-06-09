<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RequestTutor;
use App\Common;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorJobController extends Controller
{

    public function find(Request $request)
    {

        $data = RequestTutor::orderBy('request_tutors.created_at', 'desc')
            ->leftjoin('users', 'users.id', '=', 'request_tutors.student_id')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select(
                'users.*',
                'user_verifications.*',
                'request_tutors.*',
                'request_tutors.created_at as posted_at',
                'request_tutors.id as request_tutors_id'
            )->where('request_tutors.is_closed', '=', 0);


        if (!empty($request->skills)) {
            $data = $data->where('request_tutors.subject', 'like', '%' . $request->skills . '%');
        }
        if (!empty($request->location)) {
            $data = $data->where('request_tutors.location', 'like', '%' . $request->location . '%');
        }

        $data = $data->get();


        $params = [
            'skills' => $request->skills,
            'location' => $request->location,
        ];

        return view('search-tutor-job')->with('data', $data)->with('params', $params);
    }

    public function show($id)
    {
        $data = RequestTutor::orderBy('request_tutors.created_at', 'desc')
            ->leftjoin('users', 'users.id', '=', 'request_tutors.student_id')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select(
                'users.*',
                'user_verifications.*',
                'request_tutors.*',
                'request_tutors.created_at as posted_at'
            )
            ->where('request_tutors.id', $id)
            ->first();

        if (!$data) {
            Session::flash('error', 'Not Found');
            return redirect()->back();
        }

        return view('tutor-job')->with('item', $data);
    }
}
