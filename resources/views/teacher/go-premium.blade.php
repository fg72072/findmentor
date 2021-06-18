@extends('layouts.app')

@section('title')
Tutor | Premium
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/GoPremium.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/TutorProfile.css') }}">
@endpush

@section('content')
<section class="pt-5">
    <div class="container pt-5">
        <h1 style="color: #4765a0; font-weight: 700;">Premium Subscription : Calculate and Subscribe</h1>
        <h3 class="pt-3" style="font-weight: 700;">What is premium membership ?</h3>
        <div class="premMembershipContent mt-3" style="padding: 2rem 2rem;">
            <h3 style="font-weight: 700; padding-right: 4rem;">Premium membership help you to</h3>
            <li style=" padding-left: 2rem;">Rank above free members</li>
            <li style=" padding-left: 2rem;">Control your rank among other premium members.</li>
            <h3 class="pt-3">The higher you rank, more students are likely to contact you. you can learn more.You can
                learn more about premium membership here.</h3>
        </div>
        <h1 style="color: #4765a0; font-weight: 700;">Premium Subscription not active</h1>
        <p style="font-size: 1.5rem; padding-top: 1rem;">
            Please enter the coins you wished to use for your monthly
            premium subscription and check the corresponding rank for each subject.
        </p>
        <h1 style="color: #4765a0; font-weight: 700;padding-top: 1rem;">Coins / Month </h1>
        <div class="input-group mb-3" style="width: 30%;">
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="top-icons" style="line-height: 50px; text-align: start; padding-right: 1rem;">
            <span data-dismiss="modal" style="padding-left: 1.5rem; padding-right: 1.5rem;" class="message"><a>Check
                    Rank</a></span>
            <span style="padding-left: 1.5rem; padding-right: 1.5rem;" class="phone"><a>Reset</a></span>
        </div>
        <p style="font-size: 1.5rem; color: #e74c3c; padding-top: 2rem;">No Subjects Found</p>
    </div>

</section>
@stop
