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

                        <h1 class="no-margin-top ">About us</h1>

                        <p>FindMentor.com is a free website, trusted by thousands of students and teachers,
                            throughout the world.</p>

                        <p>We are not the biggest, but we care the most. Even though you will visit other websites
                            for similar services, we&nbsp;want you to remember us and tell your friends about us. We
                            put the work to be that awesome for you.</p>

                        <h2>Mission</h2>

                        <p>To make <strong>every teacher searchable in the world</strong> in their local area and
                            online. To<strong> keep the website&nbsp;free for teachers and students</strong>. To
                            provide students with a teacher within 24 hours of posting their requirements.</p>

                        <h2>Operating Principles</h2>

                        <ol>
                            <li><strong>Information should be free</strong> -&nbsp;People who can not afford to pay
                                should not be forced to.</li>
                            <li><strong>Ease of operation - </strong>Design user-friendly systems and improve them
                                continuously based on your feedback.</li>
                            <li><strong>The inclusion of everybody in the world</strong> - This means not only
                                metros and big cities but also&nbsp;remote&nbsp;areas in small and developing
                                countries.</li>
                            <li><strong>Quality&nbsp;of information</strong> - Even if we have to sacrifice ease of
                                operation a little bit, the increase in quality takes precedence.</li>
                            <li><strong>Zero tolerance</strong> towards miscreants, spammers, and marketers who care
                                about nothing but their profit.</li>
                            <li><strong>You first</strong> - Students are the future and the teachers are what make
                                them. Everything we do is focussed on how to best serve the interests of students
                                and teachers.&nbsp;</li>
                        </ol>

                        <h2>Our commitment to you</h2>

                        <p>Your data is never shared or sold to anyone without your permission. You will never be
                            spammed.</p>

                        <p>You can expect continuous&nbsp;improvement in the software, quick action on your
                            feedback, with ever-increasing features and more chances for what you want, whether it's
                            tutors or teaching jobs.</p>

                        <h2>How does the website work?</h2>

                        <p>Please see&nbsp;<a target="_blank" href="./how-it-works-teachers">how it works for
                                teachers</a> and <a target="_blank" href="./how-it-works-students">how it works for
                                students</a>.</p>

                        <h2>Our Story</h2>

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>2009</td>
                                    <td>
                                        <p>Development of TutorIndia started on&nbsp;a cold November morning in
                                            London at 3 am.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2010</td>
                                    <td>
                                        <p>TutorIndia launched in January for Indian tutors</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>The first version of FindMentor launched for online tutors around the globe
                                    </td>
                                </tr>
                                <tr>
                                    <td>2016</td>
                                    <td>The present version of FindMentor launched for online as well as local tutors
                                        around the globe.</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2>Nitpicky details - why things are the way they are</h2>

                        <p>Our "North Star" has always been what's good for the students and what's good for the
                            teachers. At times, what students want and teachers want are opposite. Even if they both
                            want the same thing, external factors such as spamming by marketers, overzealous
                            teachers, and new businesses which are trying to acquire customers become overwhelming.
                        </p>

                        <p>An example of this is that students want the contact details of teachers. In
                            tutorindia.net, we made contact details public. However, with that, we have a lot of
                            people spamming making marketing calls and miscreants making lewd comments to female
                            teachers as contact details were easily visible. That's just the tip of the
                            iceberg.&nbsp;Also, some students got hundreds of calls (not exaggerating) for a
                            requirement they posted which was very annoying.&nbsp;</p>

                        <p>Therefore, we aimed to design a system that, even though is free for normal users, has
                            enough cost of engagement so to deter the spammers and miscreants.&nbsp;</p>

                        <p>We took a couple of actions to make this happen - and some very interesting results came
                            out:</p>

                        <p><b>Holding our teachers to a higher standard</b>&nbsp;- We collect a lot of details from
                            the teachers before they can start with us. 46% of teachers don't complete their profile
                            form itself. That leaves us with sincere teachers who are willing to put the time to
                            make their profile awesome - as they realize that this is a long-term&nbsp;one-time
                            investment.</p>

                        <p>Teachers have to write a minimum description of 100 words about them and their teaching
                            methodology etc. Even though that's not much, our research tells us that most people
                            would have stopped at 40 words or less if we hadn't made a minimum of 100 words
                            mandatory. What's even more surprising is that teachers do have things to say - things
                            that can prompt a student to contact them - things that make them stand apart.&nbsp;When
                            we force them to think, teachers come up with brilliant things about themselves. This is
                            unlike most&nbsp;other websites that allow teachers to complete profiles with the bare
                            minimum data just so the website can say that they have these many tutors.&nbsp;</p>

                        <p><strong>Lesson </strong><strong>learned</strong>&nbsp;- If we dumb things down, people
                            will do dumb things. If you expect higher quality and hold them to a high standard,
                            people do rise to the challenge and do great things.</p>

                        <p><strong>Use for free but respect others -&nbsp;</strong> We wanted to keep the website
                            free but without any cost of contacting, it just didn't appear to be possible. So we
                            kept it so that students can contact three tutors for free and have to pay if they wish
                            to contact more teachers. Similarly, teachers can also be contacted by students at no
                            cost to them and some jobs are free to apply as well.</p>

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
