<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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

    static function blog($title = NULL)
    {
        if ($title) {
            $blogs = Blog::orderBy('created_at', 'ASC')->get();
            $single_blog = false;
            foreach ($blogs as $key => $blog) {
                if (Common::cleanString($blog->title) == $title) {
                    $single_blog = $blog;
                }
            }

            if (!$single_blog) {
                Session::flash('error', 'Blog Not Found');
                return redirect()->back();
            }

            return view('static pages.blog')->with('blog', $single_blog);
        }

        $blogs = Blog::orderBy('created_at', 'ASC')->paginate(10);
        return view('static pages.blog')->with('blogs', $blogs);
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

    static function contactPost(Request $request)
    {
        $data = [
            'subject' => 'test',
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->message
        ];

        Mail::send('static pages.email-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });
        Session::flash('success', 'Thanks for contacting me, I will get back to you soon!');
        return redirect()->back();
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
