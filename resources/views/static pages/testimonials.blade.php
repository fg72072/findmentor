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

                        <h1 class="no-margin-top ">Testimonials - show your love</h1>

                        <p>In here, you say nice things about us&nbsp;?</p>

                        <p>If you like what we do and would like to give a word of encouragement, please mention in the
                            comments.</p>

                        <p>For anything else, like suggestions or feedback, please <a target="_blank"
                                href="/contact">contact us</a> or <a target="_blank" href="/feedback">give feedback</a>.
                        </p>

                        <h2>Why give a testimonial?</h2>

                        <p>Even after our spectacular effort, some people are still skeptical regarding what we can do
                            for them. If you give us a stellar review about the experience you had with us, it will help
                            those people to make a decision about us.</p>

                        <p>&nbsp;</p>

                        <h2>Few things you can consider to put in your testimonial:</h2>

                        <ol>
                            <li>How did FindMentor help you?</li>
                            <li>How was your life before FindMentor?</li>
                            <li>How did your life improve after joining FindMentor?</li>
                            <li>How many students did you get?</li>
                            <li>Do you tell your friends about us? If yes, Why?</li>
                            <li>If you were to compare FindMentor&nbsp;to one of the person/things in your life, what
                                would it be?</li>
                        </ol>

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
