<?php

namespace App\Http\Controllers\Admin;

use App\RequestTutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestTutorController extends Controller
{
    public function index(Request $request)
    {

        $data = RequestTutor::orderBy('request_tutors.created_at', 'desc')
            ->leftjoin('users', 'users.id', '=', 'request_tutors.student_id')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->select(
                'users.*',
                'user_verifications.*',
                'request_tutors.*',
                'request_tutors.created_at as posted_at',
                'request_tutors.id as request_tutors_id',
                'request_tutors.student_id as request_tutors_student_id'
            )->orderBy('request_tutors.created_at', 'desc');

        if (!empty($request->std_id)) {
            $data = $data->where('request_tutors.student_id', $request->std_id);
        }
        if (!empty($request->req_id)) {
            $data = $data->where('request_tutors.id', $request->req_id);
        }

        $data = $data->get();

        return view('admin.requirements')->with('data', $data);
    }
}
