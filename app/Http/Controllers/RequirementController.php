<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RequestTutor;

class RequirementController extends Controller
{


    //    Important properties
    public $parentRoute = 'student';
    public $parentView = "student";


    public function index()
    {
        $user_id = Auth::user()->id;

        $data = RequestTutor::where('student_id',$user_id)->get();

        return view($this->parentView . '.requirement')->with('data',$data);
    }

}
