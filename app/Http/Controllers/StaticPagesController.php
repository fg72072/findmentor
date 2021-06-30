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

    static function feedback()
    {
        return view('static pages.feedback');
    }

    static function testimonials()
    {
        return view('static pages.testimonials');
    }

    static function contact()
    {
        return view('static pages.contact');
    }

    static function refundPolicy()
    {
        return view('static pages.refund-policy');
    }

    static function privacyPolicy()
    {
        return view('static pages.privacy-policy');
    }

    static function termsAndConditions()
    {
        return view('static pages.terms-and-conditions');
    }

    static function getPaid()
    {
        return view('static pages.get-paid');
    }

    static function premiumMembershipForTutors()
    {
        return view('static pages.premium-membership-for-tutors');
    }

    static function howItWorksTeachers()
    {
        return view('static pages.how-it-works-teachers');
    }

    static function ApplyAndContactStudents()
    {
        return view('static pages.how-to-apply-to-a-job-and-contact-students');
    }

    static function shareStories()
    {
        return view('static pages.share-stories');
    }
}
