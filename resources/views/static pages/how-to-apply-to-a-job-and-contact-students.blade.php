@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<!-- Home Page Styling -->
<link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/static-pages.css') }}">
<!-- Home Page Styling -->
@endpush

@section('content')
<div class="container content no-padding-top mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row" style="max-width:830px; margin:0 auto;">
                <div class="col-sm-12-">
                    <div class="blog-page-article">

                        <h1 class="no-margin-top ">How to apply to a job and contact students?</h1>

                        <p>Many teachers contact me and say: "I never get a reply from students."</p>

                        <p>The time, effort, and care you put in your job application (first message to student) matters
                            a lot. Most people send a hurried one line message. They are&nbsp;obviously at a
                            disadvantage as there are a lot of people who are willing to make an effort to craft their
                            application.&nbsp;</p>

                        <p><strong>An example: </strong></p>

                        <p>A Russian student posted requirements for an English teacher. The teacher who got the job
                            applied in Russian itself. That's personalization. That's showing that you care. She showed
                            that she is the best they can get. Other teachers who sent a generic, thoughtless message
                            like "WhatsApp me at xxx" didn't stand a chance. They didn't even get a reply from the
                            student.&nbsp;</p>

                        <p><strong>If you apply to jobs and students don't respond</strong> <strong>- this is what you
                                need to do</strong>.</p>

                        <p>Write your application/first message in such a way that:</p>

                        <ol>
                            <li>Shows that you&nbsp;understand their requirements.</li>
                            <li>Shows that you care.</li>
                            <li>Makes the student feel that you put thought and spent the time
                                to&nbsp;understand&nbsp;their problem.&nbsp;</li>
                            <li>The response looks customized. If the response is really customized, even better.</li>
                            <li>It doesn't look like a&nbsp;copy paste&nbsp;of a standard cover letter. Humans can sense
                                a template response.</li>
                            <li>It shows that you spent more than 10 seconds in applying&nbsp;for&nbsp;the job. (I am
                                being sarcastic.)</li>
                            <li>It showcases your understanding of their&nbsp;demographic.</li>
                        </ol>

                        <h2>How to contact students?</h2>

                        <p>Students can contact you directly and that's free for you.&nbsp;You&nbsp;can increase your
                            chances of getting students by getting <a target="_blank"
                                href="./premium-membership-for-tutors">the premium</a><a target="_blank"
                                href="./premium-membership-for-tutors"> membership</a>.</p>

                        <p>You can also <a target="_blank" href="./tutor-jobs">find tutor jobs</a> directly.</p>

                        <p>&nbsp;</p>

                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
@include('includes.footer')
@stop
