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

                        <h1 class="no-margin-top ">Premium membership benefits (for tutors)</h1>

                        <p><strong>Please use the&nbsp;<a target="_blank" href="/goPremium">Premium membership
                                    calculator</a>&nbsp;to calculate the required coins and <a target="_blank"
                                    href="/goPremium">buy </a><a target="_blank" href="/goPremium">premium</a><a
                                    target="_blank" href="/goPremium"> membership</a>.</strong></p>

                        <h2>What are the benefits of premium membership?</h2>

                        <p>Since you can be a premium member for as little as one coin, we don't treat all premium
                            members equally. Premium members with more coins get more benefits than premium members with
                            lesser coins.</p>

                        <ul>
                            <li><strong>Early access to jobs</strong>: Premium members <a target="_blank"
                                    href="/why-is-there-a-wait-time-to-apply-to-jobs">get a lead of up to 2 hours</a> to
                                apply to a post. Premium members with the highest coins get lead of 2 hours. The lead
                                time decreases according to the coins used for the premium membership. See details about
                                this <a target="_blank" href="/why-is-there-a-wait-time-to-apply-to-jobs">here</a>.</li>
                            <li><strong>Top Placement in the search results</strong>: This leads to more exposure and
                                hence more student inquiries. About 50% of the jobs go directly to teachers without ever
                                being public. If you are a premium member, and on top of the list, it increases your
                                chances of getting those jobs directly.&nbsp;</li>
                        </ul>

                        <h2>Why should I get premium membership for more coins rather than fewer coins?</h2>

                        <p>You shouldn't... unless there is competition. With more coins:</p>

                        <ul>
                            <li>You rank higher in the listings than premium members with fewer coins.</li>
                            <li>You get early access than premium members with fewer coins.&nbsp;See details&nbsp;<a
                                    target="_blank" href="/why-is-there-a-wait-time-to-apply-to-jobs">here</a>.</li>
                        </ul>

                        <h2>How much does it cost?</h2>

                        <p>Premium membership&nbsp;is renewed on the 1st of every month.</p>

                        <ol>
                            <li>You can take premium membership from as low as <strong>just 1 coin per month</strong>.
                            </li>
                            <li>Even if you pay just one coin per month, you will rank above free members.</li>
                            <li>The more coins you use, the higher you will rank among other premium members.</li>
                            <li>You can <strong><a target="_blank" href="/goPremium">check your
                                        rank</a></strong>&nbsp;and the coins required to come at the top using&nbsp;the
                                <strong><a target="_blank" href="/goPremium">Premium membership calculator</a>.</strong>
                            </li>
                        </ol>

                        <h2>What is rank?</h2>

                        <p>Rank is your position on the list when someone searches for the subject you teach. Higher the
                            rank, higher you are in the list - which increases your chance of being contacted by the
                            students.</p>

                        <h2>Is it mandatory?</h2>

                        <p>No.</p>

                        <h2>Is premium membership renewed monthly?</h2>

                        <p>Yes. Coins you chose to use for premium membership are automatically deducted from your
                            TeacherOn wallet on the 1st of every month.</p>

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
