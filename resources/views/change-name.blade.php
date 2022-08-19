@extends('layouts.app')

@section('title')
    Tutor | Change Name
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
                            <i class="fas fa-signature display-3 pt-3" style="color: #0076cb;"></i>
                            <h1 class="pt-4 text-center" style="font-weight: bold; letter-spacing: 2px;">Change Name</h1>
                            <hr class="w-25 mx-auto">
                        </div>
                        <div class="form pt-3">
                            <form action="{{ route('changeName') }}" method="post" id='otp_verification_form'>
                                @csrf
                                <h4 class="Info">Name</h4>
                                <input class="InpTab pl-3" disabled placeholder="{{ Auth::user()->name }}">
                                <h4 class="Info">Change Name</h4>
                                <input class="InpTab pl-3" placeholder="Change Name" name="username" required>
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding:0rem 3rem;">Save</button>
                            </form>
                        </div>
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
