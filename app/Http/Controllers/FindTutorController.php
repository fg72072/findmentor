<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FindTutorController extends Controller
{

    public function index(Request $request)
    {
        return view('find-tutor');
    }

    public function find(Request $request)
    {
        $data = User::role('teacher')->with('subject')
            ->with('experience')
            ->with('education')
            ->with('info')
            ->select('users.*')
            ->leftjoin('user_verifications', 'user_verifications.user_id', '=', 'users.id')
            ->whereNotNull('user_verifications.is_account_verified_at')
            ->whereNotNull('users.email_verified_at')
            ->where('user_verifications.active_status', 1);

        if (!empty($request->subject)) {
            $data = $data->whereHas('subject', function ($query) use ($request) {
                $query->where('subject', 'like', "%{$request->subject}%");
            });
        }
        if (!empty($request->location)) {

            $data = $data->whereHas('info', function ($query) use ($request) {
                $query->where('location', 'like', "%{$request->location}%");
            });
        }
        if (!empty($request->online_tutor)) {

            $data = $data->whereHas('info', function ($query) use ($request) {
                $query->where('online_available', $request->online_tutor);
            });
        }
        if (!empty($request->home_tutor)) {

            $data = $data->whereHas('info', function ($query) use ($request) {
                $query->where('travel_to_student', $request->home_tutor);
            });
        }
        if (!empty($request->assignment_tutor)) {

            $data = $data->whereHas('info', function ($query) use ($request) {
                $query->where('help_with', $request->assignment_tutor);
            });
        }
        if (!empty($request->level)) {

            $data = $data->whereHas('subject', function ($query) use ($request) {
                $query->where('level_to', $request->level);
            });
        }
        $data = $data->paginate(1);

        $html = '';

        if (count($data) > 0) {
            foreach ($data as $item) {
                if (isset($item['subject'][0])) {
                    $profile_url = asset('asset/profile') . '/fall-back.png';
                    if ($item->profile) {
                        $profile_url = asset('asset/profile') . '/' . $item->profile;
                    }
                    $html .= '<div class="col-12 col-md-12">
        <div class="h-100 bordered rounded">
            <div class="course-front">
                <div class="vertical-item mt-5 ml-5 mr-5">
                    <div class="item-content">
                        <a href="' . route('tutor_profile', ['id' => $item->id]) . '">
                            <h1 class="Teachername">' . $item->name . '</h1>
                        </a>

                        <div class="tagcloud pt-4">';
                    foreach ($item['subject'] as $subject) {
                        $html .= '<a href="?subject=' . $subject->subject . '" class="tag-cloud-link Maths">' . $subject->subject . '</a>';
                    }
                    $html .= '</div>
                        <div class="listing_desc pt-5">
                            <div class="profile-img "><img class="lozad-custom-profile-img" data-src="" alt="' . $item->name . ' image" loading="lazy" src="' . $profile_url . '"></div>
                            <p class="profile-description" itemprop="description">' . $item['info']->description . '</p>
                        </div>
                        <div class="listing_icons pt-5">
                            <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                title="' . $item['info']->location . '">
                                <span class="fa fa-map-marker icons" aria-hidden="true"></span>
                                <p>' . $item['info']->location . '</p>
                            </div>
                            <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                title="USD ' . $item['info']->min_fee . ' - ' . $item['info']->max_fee . '/' . $item['info']->fee_charge . ' (INR 200 - 500/hour)">
                                <span class="fa fa-usd icons" aria-hidden="true"></span>
                                <p>' . $item['info']->min_fee . '-' . $item['info']->max_fee . '/' . $item['info']->fee_charge . '
                                </p>
                            </div>
                            <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                title="' . $item['info']->total_experience_online . ' years of online teaching experience">
                                <span class="fa fa-desktop" aria-hidden="true"></span>
                                <p>' . $item['info']->total_experience_online . ' Yr</p>
                            </div>
                            <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                title="' . $item['info']->total_experience . ' years of total teaching experience">
                                <span class="fa fa-user-plus" aria-hidden="true"></span>
                                <p>' . $item['info']->total_experience . ' Yr</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
                }
            }
        };

        $html .= $data->links();

        if (count($data) == 0) {
            Session::flash('error', 'No Record Found');
            //     $html = '<div class="text-center" id="noRecordFoundOnSearchDiv" style="">
            //     No tutors found for your search. Please <a href="https://www.teacheron.com/post-requirement">Post your requirement</a>  so teachers can contact you directly.
            //     <a class="btn btn-primary margin-top-30 btn-u-lg" href="https://www.teacheron.com/post-requirement">Post your Requirement</a>
            // </div>';
            //     echo $html;
            // return 0;
        }

        echo $html;
    }
}
