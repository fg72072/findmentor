@extends('layouts.app')

@section('title')
    Tutor | Change Email
@stop
@section('header')
    @include('includes.header')
@stop
@push('include-css')
    <link rel="stylesheet" href="{{ asset('asset/css/Setting.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/footer1.css') }}">
@endpush

@section('content')
    <section>
        <div class="banner flex">
            <div class="container">
                <div class="row flex">
                    <div class="col-lg-8  col-md-12 col-12 settingOuter2">
                        <div class="Emailpg pt-2">
                            <i class="fas fa-envelope display-3 pt-3" style="color: #0076cb;"></i>
                            <h1 class="pt-4 text-center" style="font-weight: bold; letter-spacing: 2px;">Change Email</h1>
                            <hr class="w-25 mx-auto">
                        </div>
                        <form action="{{ route('changeEmail') }}" method="post" id='otp_verification_form'>
                            <div class="form pt-3">
                                <h4 class="Info">Old Email</h4>
                                <input class="InpTab pl-3" disabled placeholder="{{ Auth::user()->email }}">
                                <h4 class="Info">New Email</h4>
                                @csrf
                                <input type="email" required class="InpTab pl-3" placeholder="Enter New Email"
                                    name="newEmail">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding:0rem 3rem;">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop


@push('include-js')
    <script src="{{ asset('asset/plugins/Firebase-otp/firebase.js') }}"></script>
    <script src="{{ asset('asset/js/otp.js') }}"></script>
@endpush
@section('footer')
    @include('includes.footer')
@stop
