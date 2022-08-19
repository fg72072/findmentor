@extends('layouts.app')

@section('title')
    Tutor | Home
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
                        <h3 class="cross" style="text-align: end; padding: 1rem 1rem;">X</h3>

                        <div class="Emailpg pt-2">
                            <h1 class="pt-4" style="font-weight: bold; letter-spacing: 2px;">Profile Photo</h1>
                            <hr class="w-25 mx-auto">

                        </div>
                        <form id="regForm" action="{{ route('profile.upload') }}" method='POST'
                            enctype="multipart/form-data">
                            @csrf()
                            <div class="form pt-3">
                                <div id="profile-container" style="width: 100%">
                                    @if (Auth::user()->profile)
                                        <img id="profileImage" class="rounded-circle"
                                            style="width: 200px;height: 200px;margin: auto;display: block;"
                                            src="{{ asset('asset/profile/' . Auth::user()->profile) }}" />
                                    @else
                                        <img id="profileImage" class="rounded-circle"
                                            style="width: 200px;height: 200px;margin: auto;display: block;"
                                            src="{{ asset('asset/document/request/1623677915.fall-back.png') }}" />
                                    @endif
                                </div>
                                <input id="imageUpload" type="file" name="profile" placeholder="Photo" required="" capture>
                                <br>
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding:0rem 3rem;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@stop


@push('include-js')
    <script src="{{ asset('asset/js/Invite.js') }}"></script>
    <script>
        $("#profileImage").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview(uploader) {

            if (uploader.files && uploader.files[0]) {
                $('#profileImage').attr('src',
                    window.URL.createObjectURL(uploader.files[0]));
            }
        }

        $("#imageUpload").change(function() {
            fasterPreview(this);
        });
    </script>
@endpush

@section('footer')
    @include('includes.footer')
@stop
