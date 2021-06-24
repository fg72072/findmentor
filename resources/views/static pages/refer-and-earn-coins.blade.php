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

                        <h1 class="no-margin-top ">Refer and earn coins</h1>

                        <p>You can earn coins by sharing your&nbsp;referral link with others. Many teachers get
                            hundreds&nbsp;(even thousands) of free coins every month by using their referral link.</p>

                        <h2>What is my referral link?</h2>

                        <p>You can <a href="/referAndEarn#referralLink">get your referral link here</a>.</p>

                        <h2>How many coins do I get for each referral?</h2>

                        <p>Coins for a referral vary by country of the person you refer. You can <a
                                href="/referAndEarn#coinCountryTable">check the complete country-coin&nbsp;list
                                here</a>.</p>

                        <h2>What if someone I refer&nbsp;buys coins?</h2>

                        <p>You will get 10% of&nbsp;the coins they buy as well.&nbsp;</p>

                        <h2>I referred someone and didn't get coins. Why?</h2>

                        <ul>
                            <li>If someone joins as a student, we don't give any joining bonus for that. You will get
                                10% of the coins they buy.</li>
                            <li>For tutors, referral bonus is given only after they complete profile.</li>
                        </ul>

                        <h2>Where should I put my referral link?</h2>

                        <p>We have seen excellent work by people who refer us on Facebook. Facebook is great if you want
                            to share with a lot of people. Posting in relevant Facebook groups can be really effective.
                        </p>

                        <p>You can also share your referral links in blogs, forums, email footers and teaching
                            communities as well.&nbsp;</p>

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
