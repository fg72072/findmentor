<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\RequestTutor;
use App\Transaction;

class AdminDasboardController extends Controller
{
    public function index()
    {
        // Total Users
        $students = User::role('student')->get()->count();
        $teachers = User::role('teacher')->get()->count();
        $usersCount = $students + $teachers;
        // Total Users

        // Total Requirement Count
        $requirementsCount = RequestTutor::get()->count();
        // Total Requirement Count

        // Total Earning
        $totalEarning = Transaction::get()->sum('amount');
        // Total Earning

        // Total Messages
        $totalMessages = Message::get()->count();
        // Total Messages

        return view('admin.index')->with('users', $usersCount)->with('requirements', $requirementsCount)->with('earning', $totalEarning)->with('messages', $totalMessages);
    }
}
