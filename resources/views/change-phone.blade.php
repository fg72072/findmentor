@extends('layouts.app')

@section('title')
Tutor | Verify Phone
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/Setting.css') }}">
@endpush

@section('content')
<section>
    <div class="banner flex">
        <div class="container">
            <div class="row flex">
                <div class="col-lg-8  col-md-12 col-12 settingOuter2">
                    <div class="Emailpg pt-2">
                        <i class="fas fa-phone-alt display-3 pt-3" style="color: #0076cb;"></i>
                        <h1 class="pt-4" style="font-weight: bold; letter-spacing: 2px;">Manage Number</h1>
                        <hr class="w-25 mx-auto">
                        <p class="pt-1" style="font-weight: bold; letter-spacing: 2px;">+923443457230</p>
                    </div>

                    <div class="form pt-3">
                        <h4 class="Info">Add Code</h4>
                        <input class="InpTab pl-3" placeholder="Enter Code" id="verification">
                        <h4 class="Info">Add Number</h4>
                        <input class="InpTab pl-3" id="number" placeholder="+92 ********">
                        <div id="recaptcha-container"></div>
                        <button type="button" class="btn btn-primary btn-lg send_otp_btn" style="padding:0rem 3rem;"
                            onclick="sendOTP();">Send OTP</button>
                        <button type="button" class="hide btn btn-primary btn-lg verify_otp_btn"
                            style="padding:0rem 3rem;display: none;" onclick="verify();">Verify</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <form action="{{route('changePhone')}}" method="post" id='otp_verification_form'>
        @csrf
        <input type='hidden' id="verified_no" name='verified_no'>
    </form>
</section>
@stop


@push('include-js')
<script src="{{ asset('asset/plugins/Firebase-otp/firebase.js') }}"></script>
<script src="{{ asset('asset/js/otp.js') }}"></script>
@endpush
