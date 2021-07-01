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

                        <h1 class="no-margin-top ">Pay teachers securely</h1>

                        <p>In FindMentor, you can&nbsp;pay any teacher on the website - no matter which country the
                            teacher is in.&nbsp;</p>

                        <h2>Why did we develop this feature?</h2>

                        <p>We get frequent emails from students who paid money in advance but didn't get the service
                            satisfactorily.&nbsp;</p>

                        <p>Also, many genuine teachers don't want to work without an advance as they are afraid that
                            they won't be paid after they do the work. Many of these teachers have already lost money to
                            unreliable students.</p>

                        <p>But, you can't know if the person is genuine or if they will stop replying after you pay
                            them.</p>

                        <p>We built this system to prevent fraud and make it easy for&nbsp;teachers and students to
                            trust each other.</p>

                        <h2>How does it work?</h2>

                        <ul>
                            <li>You deposit&nbsp;the money with us by using the "Pay" button on the teacher's profile
                                page.</li>
                            <li>We keep the payment (on hold)&nbsp;with us.</li>
                            <li>The teacher delivers the service.</li>
                            <li>You release the payment to the teacher.</li>
                        </ul>

                        <h2>Why pay via FindMentor?</h2>

                        <p>Paying via us has the following advantages. You can:</p>

                        <ul>
                            <li>Secure the service - prevent fraud - stop losing money.</li>
                            <li>Get your money back in case you didn't get the service.</li>
                            <li>Work with teachers who are hesitant to work without an advance.</li>
                            <li>Pay international teachers.</li>
                            <li>Pay by card, PayPal, and other options based on your country.</li>
                            <li>Send payment in 91 currencies.&nbsp;</li>
                        </ul>

                        <h2>How much does it cost?</h2>

                        <p>It's free for you. However, to cover the taxes, payment gateway fees, and snacks, we
                            charge&nbsp;15% of the payment from teachers. If you pay them in <a href="/coins"
                                onclick="window.open(this.href, '', 'resizable=yes,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no'); return false;">FindMentor
                                coins</a>, then we reduce the fee to 10%&nbsp;</p>

                        <h2>Is it mandatory to pay teachers via FindMentor?</h2>

                        <p>No.</p>

                        <h2>What to say to teachers who ask for advance payment outside FindMentor?</h2>

                        <p>You can say them&nbsp;something like:&nbsp;</p>

                        <p>"I am afraid of paying in advance without any security. I will deposit money in your
                            FindMentor account and release it once you have completed the work."</p>

                        <p>If you have lost money to someone, do mention that as well.</p>

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
