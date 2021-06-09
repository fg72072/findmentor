<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Education;
use App\Qualification;
use App\Subject;
use App\Common;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

     //    Important properties
     public $parentModel = Teacher::class;
     public $parentRoute = 'teacher';
     public $parentView = "teacher";
 

 
}
