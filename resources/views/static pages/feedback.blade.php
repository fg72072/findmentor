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

                        <h1 class="no-margin-top ">Your Feedback powers TeacherOn</h1>

                        <p>Your feedback is very important to us. In fact it's so important, that we pay you for the
                            feedback. How many coins we pay depends on the quality of the problem/feature you contact us
                            for.&nbsp;</p>

                        <p>Our features are mostly guided by your feedback. It takes time to do things right, but we do
                            get them right, eventually.</p>

                        <p>We have given 1000s of coins for the bugs which you reported. We can't share the bugs as
                            there are a lot of those. However, following are some of the features we developed in
                            response to user feedback.</p>

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Request/Feedback/Problem</strong></td>
                                    <td><strong>Solution/Feature</strong></td>
                                </tr>
                                <tr>
                                    <td>I don't know how many people have already applied&nbsp;to&nbsp;the job. So when
                                        I apply&nbsp;to&nbsp;a job to which 100 people have already applied my coins are
                                        wasted.&nbsp;</td>
                                    <td>We now show the number of teachers who have already applied&nbsp;to&nbsp;the
                                        job.</td>
                                </tr>
                                <tr>
                                    <td>Spammers contacted me but I didn't know they were spammers until I saw their
                                        message. This is a waste of my coins.</td>
                                    <td>We made free to receive messages. We also started to refund coins for
                                        application to spam jobs.</td>
                                </tr>
                                <tr>
                                    <td>I applied to many jobs but none of the students replied.&nbsp;</td>
                                    <td>Many times students don't see messages. We now refund coins if a student with
                                        unverified phone number doesn't see your message within 15 days.</td>
                                </tr>
                                <tr>
                                    <td>50 coins to apply to all jobs is&nbsp;very expensive</td>
                                    <td>Now teachers decide the coins required to contact students. It can be free or it
                                        can be 100 coins or more.</td>
                                </tr>
                                <tr>
                                    <td>1. A student contacted me and took four sessions but didn't pay me.<br>
                                        2. A teacher took my money but didn't deliver the project as specified.</td>
                                    <td>Now students can pay teachers via our website. We hold the payment to ensure the
                                        service is delivered and ensure payment after that.&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>I need premium membership so I can come at the top of the listing pages.</td>
                                    <td>Now you can get premium member starting with just 1 coin. You decide what you
                                        want to pay for the premium membership.</td>
                                </tr>
                                <tr>
                                    <td>How can I get reviews</td>
                                    <td>Now teachers can get reviews from the students who have paid through our
                                        website. We took long to launch the review feature but we wanted to ensure that
                                        reviews were genuine. Just allowing reviews from students who have paid teachers
                                        helps us ensure that they are.</td>
                                </tr>
                                <tr>
                                    <td>Some students put fake phone numbers</td>
                                    <td>We now verify phone numbers with OTP. If a student doesn't verify phone number,
                                        then we don't show the phone number.</td>
                                </tr>
                                <tr>
                                    <td>Premium members are getting access to posts at the same time as non-premium
                                        members</td>
                                    <td>Now, premium members get notified about a post 2 hours before non-premium
                                        members. In addition to that, within that 2 hour period, the more coins a
                                        teacher uses for premium membership, the earlier they will have access to that
                                        student.</td>
                                </tr>
                            </tbody>
                        </table>

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
