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

                        <h1 class="no-margin-top ">Privacy Policy</h1>

                        <p>The privacy of our visitors is of extreme importance to us.&nbsp;</p>

                        <p>We use cookies to maintain sessions throughout the website. This helps us to serve you
                            relevant content.</p>

                        <p>We also store information about your IP to detect and prevent spammers and help keep your
                            account secure.&nbsp;</p>

                        <p>We do not sell or share your personal information with anybody, ever unless we are legally
                            obliged to do so. The only time such information is shared is when you agree to share
                            details with student/tutor.</p>

                        <h3>When you post requirements as a student</h3>

                        <p>Once you close your post, no new teachers can contact you. However, teachers who bought your
                            contact details before you closed your requirements can still contact you.</p>

                        <h2>I want to delete my account</h2>

                        <p>Please go to <a target="_blank" href="./setting">profile settings</a> to delete your
                            account.&nbsp;</p>

                        <p><strong>If you are a student</strong>, all your posts will be automatically closed and no new
                            teachers will be able to contact you. Teachers who have already contacted you may still
                            contact you privately.&nbsp;</p>

                        <p><strong>If you are a teacher</strong>, once you delete your account, we still keep your
                            details for security and legal reasons. However, your profile is no longer accessible by
                            anybody, including you. Students who have already got your contact details will be able to
                            see the messages you sent to them and your contact details.</p>

                        <p>If you require any more information or have any questions about our privacy policy, please
                            feel free to&nbsp;<a target="_blank" href="./contact">contact us</a>.&nbsp;</p>

                        <h2>I want to remove data from Google</h2>

                        <p>Please check our guide on&nbsp;<a href="./blog/how-to-remove-personal-data-from-google">how
                                to
                                remove personal data from Google</a>.</p>

                        <h2>Data management from Google login</h2>

                        <p>If you chose to login with Google, we use your Google email for registration.</p>

                        <p>If you use our "friends invite" feature, we give you the ability to select the contacts you
                            invite. We access only those contacts and store them for sending invitation on your behalf.
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
