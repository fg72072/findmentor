<?php

namespace App\Http\Controllers;

use DB;
use App\Common;
use Carbon\Carbon;
use App\RequestTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorJobController extends Controller
{

    public function index(Request $request)
    {
        return view('search-tutor-job');
    }

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
                'request_tutors.id as request_tutors_id',
                'request_tutors.student_id as request_tutors_student_id',
            )->where('request_tutors.is_closed', '=', 0)
            ->where('user_verifications.post_is_public', '=', 1)
            ->orderBy('request_tutors.created_at', 'desc');

        if (!empty($request->subject)) {
            $data = $data->where('request_tutors.subject', 'like', '%' . $request->subject . '%');
        }
        if (!empty($request->location)) {
            $data = $data->where('request_tutors.location', 'like', '%' . $request->location . '%');
        }
        if (!empty($request->online_tutor)) {
            $data = $data->where('request_tutors.online_class', $request->online_tutor);
        }
        if (!empty($request->home_tutor)) {
            $data = $data->where('request_tutors.class_at_student_place', $request->home_tutor);
        }
        if (!empty($request->assignment_tutor)) {
            $data = $data->where('request_tutors.help_type', $request->assignment_tutor);
        }
        if (!empty($request->level)) {
            $data = $data->where('request_tutors.grade_level', $request->level);
        }

        $data = $data->paginate(10);


        $html = '';
        if (count($data) > 0) {
            foreach ($data as $item) {
                $subjects = explode(",", $item->subject);
                $html .= '<div class="col-12 col-md-12 all">
                <div class="h-100 bordered rounded">
                    <div class="course-front">
                        <div class="vertical-item mt-5 ml-5 mr-5">
                            <div class="item-content">
                                <a href="' . route("show_tutor_job", ["id" => $item->request_tutors_id]) . '">
                                    <h4 class="title">' . $item->subject . ' teacher needed in ' . $item->location . '</h4>
                                </a>
                                <a href="javascript:void(0)" class="subject pt-3 contact_student"
                                    data-id="' . $item->request_tutors_student_id . '"
                                    data-requirement="' . $item->request_tutors_id . '" data-created="' . $item->posted_at . '">Contact
                                    ' . $item->name . '</a>
                                <div class="tagcloud pt-4">';


                foreach ($subjects as $subject) {
                    $html .= '<a href="?skills=' . $subject . '" class="tag-cloud-link Hum">' . $subject . '</a>';
                }


                $html .= '  </div>
                                <div class="listing_desc pt-5">
                                    <p>' . $item->detail . '</p>
                                </div>
                                <div class="listing_icons pt-5">
                                    <div class="TextIcon">
                                        <span class="fa fa-calendar icons" aria-hidden="true"></span>
                                        <p>' . Carbon::createFromFormat("Y-m-d H:i:s", $item->posted_at)->diffForHumans() . '</p>
                                    </div>
                                    <div class="TextIcon">
                                        <span class="fa fa-map-marker icons" aria-hidden="true"></span>
                                        <p>' . $item->location . '</p>
                                    </div>
                                    <div class="TextIcon">
                                        <span class="fa fa-usd icons" aria-hidden="true"></span>
                                        <p>' . $item->budget . '/Week</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }

        $html .= $data->links();

        if (count($data) == 0) {
            $html = '
            <div class="col-12 col-md-12">
                <div class="h-100 bordered rounded">
                    <div class="course-front">
                        <div class="vertical-item mt-5 ml-5 mr-5">
                            <div class="item-content">
                                <div class="text-center" id="noRecordFoundOnSearchDiv" style="">
                                    No Requirement found for your search. Please <a href="">Post your requirement</a>  so teachers can contact you directly.
                                    <div>
                                        <a class="btn btn-primary margin-top-30 btn-u-lg" href="">Post your Requirement</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

        echo $html;
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
