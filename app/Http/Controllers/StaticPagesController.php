<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    static function aboutUs()
    {
        return view('static pages.about');
    }

    static function staySafe()
    {
        return view('static pages.stay-safe');
    }

    static function blog()
    {
        return view('static pages.blog');
    }

    static function referAndEarnCoin()
    {
        return view('static pages.refer-and-earn-coins');
    }

    static function faq()
    {
        return view('static pages.faq');
    }

    static function coins()
    {
        return view('static pages.coins');
    }

    static function howItWorkStudent()
    {
        return view('static pages.how-it-works-students');
    }

    static function payTeacher()
    {
        return view('static pages.pay-teachers');
    }
}
