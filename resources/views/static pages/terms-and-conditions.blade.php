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

                        <h1 class="no-margin-top ">Terms and conditions</h1>

                        <h2>General</h2>

                        <ul>
                            <li>You can not make multiple accounts. One user should have only one account. Failing this
                                may result in banning all your accounts.</li>
                            <li>You are responsible for your money and safety when dealing with others. Please do your
                                diligence. We try our best to do our part.</li>
                            <li>We reserve the right to suspend your account any time without notice. This includes
                                discrediting your&nbsp;<a target="_blank" href="/coins">coins</a>&nbsp;balance.</li>
                            <li>We reserve the right to put your name in our <a target="_blank"
                                    href="/scammers">scammer&nbsp;list</a>.&nbsp;</li>
                        </ul>

                        <h2>For Students</h2>

                        <ul>
                            <li>You can not share contact details&nbsp;in the job posting. Accounts that do that are
                                automatically banned.</li>
                            <li>If you chose to share your contact details with a tutor, it's your responsibility to
                                verify their credentials, identity, and background check.</li>
                            <li>You are also responsible for any monetary transactions and refunds. We are not liable
                                for any fraudulent activity.</li>
                        </ul>

                        <h2>For tutors</h2>

                        <ul>
                            <li>We do not vet students for their credit history or payment record.&nbsp;It's your
                                responsibility to check their credentials and manage payments and refunds.</li>
                            <li>Your profile will be permanently banned if you share contact details unless specifically
                                asked for the same.</li>
                        </ul>

                        <h2>&nbsp;</h2>

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
