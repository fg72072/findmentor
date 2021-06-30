<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Education;
use App\Qualification;
use App\Subject;
use App\User;
use App\Common;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\UserAccountVerificationRedirection;
use App\UserVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeacherAccountVerificationController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;

        $detail_is_filled = User::join('user_verifications as uv', 'uv.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->first();

        if ($detail_is_filled->is_verification_detail_complete == 1 && $detail_is_filled->is_account_verified_at == NULL) {
            Session::flash('error', 'Your Account Has Under Verification Process');
            return redirect('/');
        }

        if ($detail_is_filled->is_verification_detail_complete == 1) {
            return redirect('/');
        }

        $data['teacher']        = Teacher::where('teacher_id', $user_id)->first();
        $data['education']      = Education::where('teacher_id', $user_id)->first();
        $data['qualification']  = Qualification::where('teacher_id', $user_id)->first();
        $data['subject']        = Subject::where('teacher_id', $user_id)->first();

        return view('teacher.account')->with('data', $data);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $name = '';

        $postal_code = $request->postal_code;

        if (isset($request->postal_code_available) && $request->postal_code_available == 'no') {
            $postal_code = NULL;
        }

        $items = User::find($user_id)->first();

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $name = $this->getFileName($image);
            $path = $this->getProfilePicPath();
            $image->move($path, $name);

            if ($items) {
                $this->unlinkProfilePic($items->profile);
            }
        }

        User::find($user_id)->update(['profile' => $name]);

        Teacher::updateOrCreate([
            'teacher_id' => $user_id
        ], [
            'teacher_id' => $user_id,
            'type' => $request->type,
            'current_role' => $request->role,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'location' => $request->location,
            'phone' => $request->phone,
            'postal_code' => $postal_code,
            'fee_charge' => $request->charge_by,
            'min_fee' => $request->min_fee,
            'max_fee' => $request->max_fee,
            'fee_detail' => $request->fee_detail,
            'total_experience' => $request->total_experience,
            'total_experience_online_offline' => $request->experience_offline_online,
            'total_experience_online' => $request->experience_online,
            'travel_to_student' => $request->travel_to_student,
            'online_available' => $request->online_available,
            'digital_pen' => $request->digital_pen,
            'help_with' => $request->give_homework,
            'full_time_employee' => $request->full_time_employee,
            'interested_in' => $request->opportunity
        ]);

        Education::updateOrCreate([
            'teacher_id' => $user_id
        ], [
            'teacher_id' => $user_id,
            'institute_name' => $request->institute_name,
            'degree_type' => $request->degree_type,
            'degree_name' => $request->degree_name,
            'start_month' => $request->education_start_month,
            'start_year' => $request->education_start_year,
            'end_month' => $request->education_end_month,
            'end_year' => $request->education_end_year,
            'associate' => $request->education_associate,
            'speciality' => $request->speciality,
            'score' => $request->score
        ]);

        Qualification::updateOrCreate([
            'teacher_id' => $user_id
        ], [
            'teacher_id' => $user_id,
            'organization_name' => $request->organization_name,
            'designation' => $request->designation,
            'degree' => $request->degree_name_experience,
            'start_month' => $request->experience_start_month,
            'start_year' => $request->experience_start_year,
            'end_month' => $request->experience_end_month,
            'end_year' => $request->experience_end_year,
            'associate' => $request->experience_associate,
            'job_description' => $request->job_description
        ]);

        Subject::updateOrCreate([
            'teacher_id' => $user_id
        ], [
            'teacher_id' => $user_id,
            'subject' => $request->subject,
            'level_from' => $request->level_from,
            'level_to' => $request->level_to,
        ]);

        UserVerification::updateOrCreate([
            'user_id' => $user_id
        ], [
            'is_verification_detail_complete' => 1,
        ]);


        Session::flash('success', 'Your Account Has Under Verification Process');
        return redirect('/');
    }



    private function getFileName($image)
    {
        return time() . '.' . str_replace(' ', '_', strtolower($image->getClientOriginalName()));
    }


    private function getProfilePicPath()
    {
        return public_path() . "/asset/profile/";
    }


    private function unlinkProfilePic($file)
    {

        $file_path = $this->getProfilePicPath();
        $file = $file_path . $file;

        if (file_exists($file)) {
            @unlink($file);
            return true;
        }

        return false;
    }
}
