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

                        <h1 class="no-margin-top ">Stay safe - Protecting yourself in the global marketplace</h1>

                        <p>We already know that 99.9% of&nbsp;students and teachers are honest and trustable.&nbsp;We
                            also try our best to keep the website clean and safe. However, it's not possible for us to
                            verify everyone's credentials, intentions, and integrity. That's why you have to be alert
                            against potential financial and physical damage when dealing with strangers.</p>

                        <h2>Summary: If you read nothing else:</h2>

                        <ol>
                            <li>If you are meeting in person, <strong>meet at a public location</strong> like a
                                library/mall, etc.</li>
                            <li><strong><a target="_blank" href="/pay-teachers">Pay</a> and <a target="_blank"
                                        href="/get-paid">receive payments</a> via TeacherOn.com</strong>. If payment is
                                made via us, we secure payment for teachers and ensure services for students.&nbsp;</li>
                            <li>For students:
                                <ol>
                                    <li>If you chose to pay outside of TeacherOn: try to&nbsp;<strong>pay with
                                            PayPal</strong> - they have fraud protection.</li>
                                    <li>If paying directly in a bank account: if the tutor's profile name doesn't match
                                        bank account etc, you should&nbsp;be skeptical that the tutor might be a fraud.
                                    </li>
                                </ol>
                            </li>
                            <li>For teachers:&nbsp;
                                <ol>
                                    <li>If receiving payment outside of TeacherOn, start work only after you <strong>get
                                            at the least a partial payment</strong>.</li>
                                </ol>
                            </li>
                            <li>Stay away from scammers
                                <ul>
                                    <li>Here's a&nbsp;<a target="_blank" href="/scammers">list of known scammers</a>.
                                        Make sure you aren't interacting with them.</li>
                                </ul>
                            </li>
                        </ol>

                        <h2>How to protect yourself online?</h2>

                        <p>Most scams are done online - mostly due to anonymous nature. We are working every day to make
                            the system so it's easier to trust individuals. In the meantime, here are a few things you
                            should know.</p>

                        <p><strong>For Teachers</strong></p>

                        <ol>
                            <li>Ask to <a target="_blank" href="/get-paid">be paid via TeacherOn</a>. Most students are
                                unwilling to pay in advance because they are unsure of the services. However, since we
                                are protecting their payment (via escrow) from bad tutors, they will pay you as it's
                                risk-free for them. You will get the funds in 30 days even if the student&nbsp;stops
                                responding - something which happens to a lot of tutors after they have given the
                                services.</li>
                            <li>For projects/assignments, always ask for payment in advance for the work to be done. If
                                the student is unwilling to pay, ask a partial amount. Send the proof of the partial
                                work and get more payment to complete the work.</li>
                            <li>For online tutoring, give a demo of one hour or whatever you are comfortable with. That
                                should tell the student if you are a good fit. For further sessions, ask the money to be
                                deposited as the lessons go.&nbsp;</li>
                        </ol>

                        <p><strong>For Students</strong></p>

                        <ol>
                            <li><a target="_blank" href="/pay-teachers">Pay via TeacherOn</a>. We hold your funds with
                                us until you are happy with the provided service. We also help you secure a&nbsp;refund
                                if you are unsatisfied with the tutor.</li>
                            <li>If you chose to pay outside of Teacheron, pay with PayPal. They have a buyer protection
                                policy.&nbsp;Make sure you have selected the "Paying for services" option while making
                                the payment.&nbsp;</li>
                            <li>Raise a dispute if you don't get the promised service.</li>
                            <li>If the expert says to close a dispute as they will deliver shortly, just say politely
                                that you will close dispute once they deliver as promised. This is important as you
                                can't raise dispute again once you close a dispute in PayPal.</li>
                            <li>If not paying with TeacherOn or PayPal, tread carefully, and pay as little as possible
                                initially.</li>
                            <li>Check our&nbsp;<a target="_blank" href="/scammers">list of known scammers</a>.</li>
                            <li>Search online for known scammers by just googling "{tutor name}+scam".</li>
                            <li>Most scammers won't use real names in their profiles. However, they give you correct
                                account details when receiving payment. Make sure to double-check that against known
                                scams.&nbsp;</li>
                        </ol>

                        <h2>Meeting in person?</h2>

                        <p>When meeting in person, the danger of financial fraud is relatively less. Physical security
                            should be your main concern.&nbsp;You probably already know how to handle yourself. If not,
                            you can blame your parents ?</p>

                        <p>Please meet at a public location for at least the first few meetings.</p>

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
