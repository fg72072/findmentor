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

                        <h1 class="no-margin-top ">Refund Policy</h1>

                        <p>This refund policy applies if you are dealing directly with TeacherOn&nbsp;staff. If you are
                            dealing with students and teachers listed on the website, please see the&nbsp;<a
                                target="_blank" href="/terms-and-conditions">terms and conditions</a>.&nbsp;</p>

                        <h2>Coin Purchase</h2>

                        <p>No refund is given on purchased&nbsp;<a target="_blank" href="/coins">coins</a>.</p>

                        <div><strong>Money deducted but didn't get coins?</strong></div>

                        <p>If the money was deducted but you didn't get coins, you will get a refund automatically from
                            your bank within a maximum of 14 days - it usually happens much faster in most cases. If we
                            do get the money (usually happens within a day), we will credit coins in your account and
                            send you a confirmation email when that happens.</p>

                        <h2>When teachers contact a student</h2>

                        <p>If a teacher contacts a student whose phone isn't&nbsp;verified, and the student doesn't read
                            the message within 15 days, we refund coins for that. We also give refunds if
                            teachers&nbsp;spend coins on fake/spam/scam&nbsp;jobs automatically.</p>

                        <h2>When student contact teachers</h2>

                        <p>Coins used to contact a tutor, free or paid, are not refunded if you are unable to reach the
                            tutor for whatever reason.&nbsp;</p>

                        <h2>For student payments to tutors outside of teacheron.com</h2>

                        <p>If any payment is made outside our website, we can't do anything about it. You may still
                            contact us and we will try to help but we can't guarantee that we will be able to get your
                            refund. Please see <a href="#refundFromTutorsThroughUs">how refunds work when you pay via
                                teacheron.com</a>.</p>

                        <h2 id="refundFromTutorsThroughUs">For student payments to tutors via teacheron.com</h2>

                        <p>When you pay tutors via teacheron.com:</p>

                        <ul>
                            <li>Chose the option to "Release payment after work is complete"
                                <ul>
                                    <li><strong>If you chose to release payment later, you may dispute the payment in
                                            case there is a problem.</strong></li>
                                    <li><strong>Once you release&nbsp;the payment, then we are unable to get a refund.
                                        </strong></li>
                                    <li><strong>If you chose to release payment immediately, that's also a confirmation
                                            that the services have been delivered and you are satisfied with the
                                            provided service.</strong></li>
                                </ul>
                            </li>
                            <li>While making payment, <strong>if you chose to release payment immediately, we won't be
                                    able to get the refund for you in case of a dispute.&nbsp;</strong></li>
                            <li><strong>In case of a dispute, if a student and tutor&nbsp;can't come to a mutual
                                    settlement, whatever decision we make will be final.</strong>&nbsp;</li>
                            <li>We take a 15% fee which is taken from the tutor's account
                                <ul>
                                    <li>5% of this 15% is fixed and is non-refundable</li>
                                    <li>The remaining 10% of this fee is variable i.e. if you get a partial refund, we
                                        give the 10% fee as part of the refund.</li>
                                    <li>If you take a full refund from the tutor, we still keep the 5% fixed fee and
                                        return the remaining 95%.</li>
                                </ul>
                            </li>
                            <li>Examples of Payment<br>
                                <img class="img-responsive w-100 h-100" alt=""
                                    src="https://blogassets2.teacheron.com/Payout-samples.png">
                            </li>
                        </ul>
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
