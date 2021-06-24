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

                        <h1 class="no-margin-top ">How it works - Students</h1>

                        <p>Once you&nbsp;<a target="_blank" href="/post-requirement">post your
                                requirements</a>,&nbsp;relevant teachers will contact&nbsp;you.&nbsp;</p>

                        <p>You can also <a target="_blank" href="/tutors">search for teachers</a> and contact them on
                            your own.</p>

                        <h2>How much does it cost me when a teacher contacts me?</h2>

                        <p>Nothing. If a teacher contacts you, it's free for you.</p>

                        <h2>How many teachers can I contact?</h2>

                        <p>To get you started, we give you 150&nbsp;<a target="_blank" href="/coins">coins</a>&nbsp;to
                            contact 3 teachers.</p>

                        <p>After that, you can wait for teachers to contact you which is free for you.</p>

                        <p>If you wish to contact more teachers, you can also buy coins.</p>

                        <h2>What happens when I am in touch with a tutor?</h2>

                        <p>You and the teacher decide the terms, the work to be done, remuneration and the payment
                            method. We are not involved in that.&nbsp;</p>

                        <h2>What kind of quality can I expect from teachers?</h2>

                        <p>We deliberately make it hard to be a teacher at our website. Due to this, only 54% of
                            teachers are able to complete the application process. We also remove and disable many
                            teachers because of various reasons. Teachers also have to pay a small amount to contact
                            you. This leads to a spam free experience where only genuine teachers apply.</p>

                        <p>Having said that, we don't personally verify everyone's teaching ability. Therefore, you will
                            find all kinds of teachers on the website. With some effort, you can find great teachers.
                        </p>

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
