<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestTutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RequestTutorController extends Controller
{

    //    Important properties
    public $parentModel = RequestTutor::class;

    public function index()
    {
        return view('student.request');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $name = '';

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = $this->getFileName($image);
            $path = $this->getProfilePicPath();
            $image->move($path, $name);
        }

        $this->parentModel::Create([
            'student_id' => $user_id,
            'location' => $request->location,
            'phone' => $request->phone,
            'detail' => $request->detail,
            'subject' => $request->subject,
            'grade_level' => $request->grade,
            'help_type' => $request->guide_type,
            'online_class' => $request->online_class,
            'class_at_student_place' => $request->class_at_student_place,
            'class_at_tutor_place' => $request->class_at_tutor_place,
            'budget' => $request->budget,
            'gender_preference' => $request->gender_preference,
            'no_of_tutor' => $request->no_of_tutor,
            'working_type' => $request->working_type,
            'file' => $name,
        ]);

        Session::flash('success', 'New Post Successfully Created.');
        return redirect()->back();
    }

    public function postClosed(Request $request, $id)
    {
        $this->parentModel::where('id', $id)->update(['is_closed' => 1]);

        Session::flash('success', 'Your Post Successfully Closed.');
        return redirect()->back();
    }

    public function rePost(Request $request, $id)
    {
        $this->parentModel::where('id', $id)->update(['is_closed' => 0]);

        Session::flash('success', 'Your Post Successfully Restored.');
        return redirect()->back();
    }

    private function getFileName($image)
    {
        return time() . '.' . str_replace(' ', '_', strtolower($image->getClientOriginalName()));
    }


    private function getProfilePicPath()
    {
        return public_path() . "/asset/document/request";
    }
}
