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

                        <h1 class="no-margin-top ">Get paid securely from students around the world</h1>

                        <p>Now, you can get payments&nbsp;from students anywhere in the world via TeacherOn.</p>

                        <h2>Why did we develop this feature?</h2>

                        <p>We get frequent emails from teachers who gave their services, but students didn't pay
                            them.&nbsp;</p>

                        <p>Also, many genuine students don't want to pay in&nbsp;advance because they are afraid of
                            losing money. Many of these students have already lost money to unreliable service
                            providers.</p>

                        <p>We built this system to prevent fraud and make it easy for&nbsp;teachers and students to
                            trust each other.</p>

                        <h2>How does it work?</h2>

                        <ul>
                            <li>The student deposits the money by using the "Pay" button on your profile page.</li>
                            <li>We keep the payment (on hold)&nbsp;with us.</li>
                            <li>You deliver the service.</li>
                            <li>The payment is released to you.</li>
                        </ul>

                        <h2>Why get payment via TeacherOn?</h2>

                        <p>Getting payments via us has the following advantages. You can:</p>

                        <ul>
                            <li>Secure payment before service - prevent fraud - stop losing money.</li>
                            <li>Get advanced payments from students who are hesitant&nbsp;to pay in advance.</li>
                            <li>Get payment from international students.</li>
                            <li>Give students the option to pay by card.</li>
                            <li>Accept payment in 91 currencies. We will convert the money to your currency and
                                deposit&nbsp;to your account.</li>
                            <li>Get reviews with "verified label." - Once a student pays you via us, we know with a fair
                                degree of certainty that the review is genuine. We label reviews by these students as
                                "Verified," which generates extra trust in the students' that visit your profile.</li>
                        </ul>

                        <p>In the future, we will also use reviews to determine tutor rankings and suggestions to
                            students.</p>

                        <h2>Which payment mode can I use to receive payments?</h2>

                        <ul>
                            <li><strong>Bank account</strong>&nbsp;(15% fee) -&nbsp;We can currently send payments to
                                bank accounts in Australia, Canada, India, and the USA.</li>
                            <li><strong>PayPal</strong> (15% fee) - PayPal helps us to send money to <a
                                    href="https://www.paypal.com/webapps/mpp/country-worldwide" target="_blank">over 200
                                    countries</a>.&nbsp;When we send you a PayPal payment, we pay the fee so you get the
                                full amount we send. You don't pay the usual 4% fee to PayPal for receiving payments.
                            </li>
                            <li><strong>TeacherOn Coins</strong> (10% fee) - For everybody else, you can get paid in
                                TeacherOn coins.</li>
                        </ul>

                        <h2>How much is the fee for receiving payments?</h2>

                        <p>It's 15% if you are getting paid in Bank account or PayPal. It's 10% if you get paid in
                            TeacherOn coins.&nbsp;We use this fee to pay taxes,&nbsp;payment gateway providers (people
                            who help us to collect payment online), and for food.&nbsp;</p>

                        <h2>How to get payment via TeacherOn?</h2>

                        <p>Once logged in as a tutor, you can go to Menu &gt; Wallet &gt;&nbsp;<a
                                href="/userPayoutSettings" target="_blank">Accounts (Getting paid)</a>&nbsp;and set up
                            all the ways you would like to be paid.&nbsp;</p>

                        <p>Students can go to your profile link and click on the "Pay" button to pay you.</p>

                        <h2>Benefits and disadvantages of&nbsp;getting paid in TeacherOn coins?</h2>

                        <h3>Benefits</h3>

                        <ul>
                            <li>Only 10% fee as opposed to 15% for other methods</li>
                            <li>Instant access to the credited coins</li>
                            <li>You don't have to buy coins with your money</li>
                        </ul>

                        <h3>Disadvantages</h3>

                        <ul>
                            <li>You can spend coins only in TeacherOn and can't buy a Pizza with them.</li>
                        </ul>

                        <h2>Is it mandatory to receive payments via TeacherOn?</h2>

                        <p>No.</p>

                        <h2>What to say to students who are not willing to pay in advance?</h2>

                        <p>You can say to the student something like:&nbsp;</p>

                        <p>"Please go to my profile and click on the Pay&nbsp;button. There, you can schedule the
                            payment to be&nbsp;released later. The Payment won't be released to me until you are
                            satisfied and release the payment yourself."</p>

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
