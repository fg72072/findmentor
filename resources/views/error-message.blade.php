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
<!-- Home Page Styling -->
@endpush

@section('content')
<div class="container content">
    <div class="row mt-5 mb-5">
        <!-- Begin Content -->
        <div class="col-md-12">
            <div class="headline headline-md">
                <h3 style="border-bottom: 2px solid green;">
                    <font color="red">Error: </font>
                </h3>
            </div>
            You are logged in with {{ Auth::user()->email }} as a {{Auth::user()->getRoleNames()[0]}}. You do not have
            access to visit this page.
            <span style="color:red"> <strong>{{session('error_message')}}</strong></span>
            @role('teacher')
            @if (session('error_message') == 'Email Verification Required')
            <div id="top-alert" class="alert alert-danger mt-2" role="alert">
                <strong>Email Verification!</strong>
                Before proceeding, please check your email for a verification link. If you did not receive the email,
                <form class="d-inline" method="POST" action="{{route('verification.resend')}}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request
                        another</button>.
                </form>
            </div>
            @endif
            @endrole


        </div>
        <!-- End Content -->
    </div>
</div>
@stop

@section('footer')
<div style="position: absolute;bottom: 0;width: 100%;">
    @include('includes.footer')
</div>
@stop
