<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumCoinController extends Controller
{
    public function index()
    {
        return view('teacher.go-premium');
    }
}
