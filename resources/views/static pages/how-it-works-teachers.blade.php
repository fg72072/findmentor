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

                        <h1 class="no-margin-top ">How it works - Teachers</h1>

                        <p>To contact students and teaching opportunities, you first have to complete your teaching
                            profile.</p>

                        <p>Once you complete your teaching profile, you can contact students for potential teaching
                            opportunities. Students can also contact you directly.</p>

                        <h2>How much does it cost me if a student contacts me?</h2>

                        <p>Nothing. If a student contacts you directly, it's free for you.</p>

                        <h2>How much does it cost me if I contact students?</h2>

                        <p>You will find that many students are free to contact. For others, you will need <a
                                target="_blank" href="./coins">coins</a>.</p>

                        <p>Coins required to contact a lead vary from 0 (Free) to 100s of coins.</p>

                        <h2>Why do I have to pay to contact students?</h2>

                        <p>We tried to keep it free. But students were flooded with hundreds of messages and felt
                            spammed. A small price to contact a student limits the number of applications for any job
                            posting. Even now, if a student doesn't get sufficient inquiries, we make it free to contact
                            them until sufficient teachers have contacted them.</p>

                        <h2>Who decides the coins required to contact a student?</h2>

                        <p>You do. Coins required to contact a lead vary with the competition&nbsp;among teachers —
                            posts with low competition become free. High competition leads to an increase in price.</p>

                        <p>Response to a lead also determines the starting price of similar future leads.&nbsp;</p>

                        <h2>What happens after I contact a student?</h2>

                        <p>You and the student decide the terms, the work to be done, remuneration, and the payment
                            method. We are not involved in that.</p>

                        <h2>What if the student doesn't respond when I contact them?</h2>

                        <p>There can be many reasons for this:&nbsp;</p>

                        <ol>
                            <li>The student may have already found another teacher.</li>
                            <li>The student didn't find your initial message worthy of a reply.</li>
                            <li>The student is just not checking the messages for any number of reasons.</li>
                        </ol>

                        <p>If the student doesn't even check your message within 15 days and doesn't have a verified
                            phone number, we give a full refund for the coins used to send that message. Once refunded,
                            coins won't be deducted again even if the student sees your message after 15 days.</p>

                        <p>If a student sees your message but doesn't reply, then no refund is given. We also provide a
                            refund&nbsp;in case the job posted is a scam/spam/mistake.&nbsp;</p>

                        <h2>What if I can't pay for coins?</h2>

                        <p>It’s still our privilege to serve you because teachers are a critical part of any society. I
                            believe you don’t want to pay because you haven’t found any value with us. It’s upon us to
                            give you the value first.</p>

                        <p>Therefore, you can:</p>

                        <ol>
                            <li>
                                <p>Wait for students to contact you (free for you).</p>
                            </li>
                            <li>
                                <p>Apply to jobs that are available&nbsp;for free. A post becomes free to apply if less
                                    than three teachers apply within 36 hours.</p>
                            </li>
                            <li>
                                <p>See other options for <a href="./coins">how to get coins</a> besides
                                    paying for them.</p>
                            </li>
                        </ol>

                        <h2>When do these coins expire?</h2>

                        <p>Coins don't expire, ever.</p>

                        <h2>How do I get paid?</h2>

                        <p>Teachers deal directly with students or hiring organizations. So you decide the amount and
                            payment mode with your&nbsp;students/clients.&nbsp;</p>

                        <p>You can secure your payment by <a target="_blank" href="./get-paid">getting paid via
                                FindMentor</a>. If you chose to get paid directly, please read <a target="_blank"
                                href="./stay-safe">stay safe</a> to secure&nbsp;yourself from bad clients.</p>

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
