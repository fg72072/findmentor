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

                        <h1 class="no-margin-top ">Coins - FindMentor Currency</h1>

                        <p class="alert alert-info">For payments between students and teachers, please read <a
                                target="_blank" class="underline" href="./pay-teachers">Sending payments</a> and <a
                                target="_blank" class="underline" href="./get-paid">Getting paid</a>.</p>

                        <p>Since we have teachers and students from over 130 countries, discussing prices
                            in&nbsp;individual currencies can be confusing. Therefore, we use a common currency,
                            "FindMentor coins" or just "coins" for most&nbsp;transactions. You can get 50 coins for
                            1USD.
                            You can view available discounts&nbsp;and prices for other currencies on the&nbsp;<a
                                target="_blank" href="./buy-coin">Buy coins page</a>.</p>

                        <h2>How do teachers use coins?</h2>

                        <p>Teachers use coins to:</p>

                        <ol>
                            <li>Contact students i.e. apply to jobs</li>
                            <li>Get&nbsp;<a href="./premium-membership-for-tutors">Premium</a><a
                                    href="./premium-membership-for-tutors"> membership</a></li>
                            <li>Show contact details&nbsp;to students
                                directly</li>
                        </ol>

                        <p>Please see the details on <a target="_blank" href="./how-it-works-teachers">How it works for
                                teachers</a>.</p>

                        <h2>How do students use coins?</h2>

                        <p>Students use coins to contact teachers. Please see the details at&nbsp;<a target="_blank"
                                href="./how-it-works-students">How it works for students</a>.</p>

                        <h2 id="howToGetCoins">How can I get coins?&nbsp;</h2>

                        <ul>
                            <li><strong>Refer teachers</strong>:&nbsp;If anybody registers after visiting <a
                                    target="_blank" href="./refer-and-earn">your referral link</a>, you will get coins
                                when
                                they join. You will also get coins when they buy coins. <a target="_blank"
                                    href="./refer-and-earn-coins">See&nbsp;details about referral</a>.</li>
                            <li><strong>Invite Friends:</strong>&nbsp;We include your referral link and send mails on
                                your behalf when you invite friends. If any
                                of your invited friends join, you get coins as per our referral plan above.</li>
                            <li><strong>Buy:</strong>&nbsp;You can&nbsp;<a href="buy-coin">buy
                                    coins</a>&nbsp;if you need coins instantly.&nbsp;</li>
                        </ul>

                        <h2>After how long do the coins expire?</h2>

                        <p>We feel it's unethical to force you to spend coins on jobs you don't want. Doing so leads to
                            a bad experience for you and the students you contact. Therefore, <strong>the coins never
                                expire</strong>. We believe this will allow you to use coins at the pace you are
                            comfortable with&nbsp;to&nbsp;contact only the relevant students.</p>

                        <h2>Do we have any special discounts and offers for buying coins?</h2>

                        <p>We don't do gimmicks or flash sales. That's because&nbsp;we believe you should buy coins only
                            if you have faith in the value you get, not because of some fake urgency. However, you can
                            get up to 50% discount depending on how many coins you buy.&nbsp;</p>

                        <h2>Can I convert coins into cash?</h2>

                        <p>No.</p>

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
