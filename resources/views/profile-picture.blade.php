@extends('layouts.app')

@section('title')
  Tutor | Home
@stop

@push('include-css')
   <link rel="stylesheet"  href="{{ asset('asset/css/Setting.css') }}">
@endpush

@section('content')
    <section>
        <div class="banner flex">
            <div class="container">
                <div class="row flex">
                    <div class="col-lg-8  col-md-12 col-12 settingOuter2">
                        <h3 class="cross" style="text-align: end; padding: 1rem 1rem;">X</h3>

                        <div class="Emailpg pt-2">
                            <i class="far fa-images display-3 pt-3" style="color: #0076cb;"></i>
                            <h1 class="pt-4" style="font-weight: bold; letter-spacing: 2px;">Profile Photo</h1>
                            <hr class="w-25 mx-auto">

                        </div>
                        <form id="regForm" action="{{route('profile.upload')}}" method='POST' enctype="multipart/form-data">
                            @csrf()
                            <div class="form pt-3">
                                <h4 class="Info">Upload an Image</h4>
                                <input type="file" class="InpTab pl-3" name='profile' placeholder="Enter Old Email">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding:0rem 3rem;">Save</button>
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
@endpush

