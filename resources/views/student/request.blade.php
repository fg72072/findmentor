@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/BillingAddress.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
@endpush

@section('content')

<section>
    <div class="container">
        <p class="text-center text-capitalize pt-5 CoinSubHead">Best Tutors in Town</p>
        <hr class="w-25 mx-auto">
        <h1 class="display-2 pl-5 pr-5 text-center CoinHead">Request a Tutor</h1>
    </div>
</section>

<section>
    <div class="container">
        <form id="regForm" action="{{route('request.create')}}" method='POST' enctype="multipart/form-data">
            @csrf()
            <div class="progress ProgressBar">
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>

            <div class="tab">
                <div class="PositionInfo pt-4">
                    <h1 class="Info">PERSONAL INFORMATION</h1>
                </div>
                <div class="form pt-5">
                    <h4 class="Info">Location</h4>
                    <input class="InpTab" placeholder="Enter Location" name='location'>
                    <h4 class="Info">Phone</h4>
                    <input class="InpTab" placeholder="Enter Phone" name='phone'>
                    <h4 class="Info">Details</h4>
                    <input class="InpTab" placeholder="Enter Details" name='detail'>
                </div>
            </div>

            <div class="tab">
                <div class="PositionInfo pt-4">
                    <h1 class="Info">PERSONAL INFORMATION</h1>
                </div>

                <div class="form pt-5">

                    <h4 class="Info">Subject</h4>
                    <input class="InpTab" placeholder="Enter Subject" name='subject'>

                    <h4 class="Info">Level</h4>

                    <select class="InpTabSelect" name='grade'>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="begginer">Begginer</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="expert">Expert</option>
                    </select>


                    <h4 class="Info">I want</h4>
                    <select class="InpTabSelect InpTab" name='guide_type'>
                        <option value="" disabled selected>Select</option>
                        <option value="Assignment Help">Assignment Help</option>
                        <option value="Tutoring">Tutoring</option>
                    </select>

                    <h4 class="Info">Meeting Option</h4>

                    <div class="CheckBoxTitle odd">
                        <input type="checkbox" class="check" name='online_class' value='yes'>
                        <p class="Info">Online (using Skype etc)</p>
                        <input type="checkbox" class="check" name='class_at_student_place' value='yes'>
                        <p class="Info">At my place (home/institute)</p>
                        <input type="checkbox" class="check" name='class_at_tutor_place' value='yes'>
                        <p class="Info">Travel to tutor</p>
                    </div>

                </div>

            </div>

            <div class="tab">
                <div class="PositionInfo pt-4">
                    <h1 class="Info">PERSONAL INFORMATION</h1>
                </div>

                <div class="form pt-5">

                    <h4 class="Info">Budget</h4>
                    <input class="InpTab" placeholder="Enter Budget" name='budget'>

                    <h4 class="Info">Gender Preference</h4>
                    <select class="InpTabSelect" name='gender_preference'>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Preferably Male">Preferably Male</option>
                        <option value="Preferably Female">Preferably Female</option>
                        <option value="Only Male">Only Male</option>
                        <option value="Only Female">Only Female</option>
                    </select>


                    <h4 class="Info">Tutors Wanted</h4>
                    <select class="InpTabSelect" name='no_of_tutor'>
                        <option value="" disabled selected>Select</option>
                        <option value="Only One">Only One</option>
                        <option value="More than One">More than One</option>
                        <option value="As many as possible">As many as possible</option>
                    </select>

                    <h4 class="Info">I need someone
                    </h4>
                    <select class="InpTabSelect" name='working_type'>
                        <option value="" disabled selected>Select</option>
                        <option value="Part time">Part time</option>
                        <option value="Full time">Full time</option>
                    </select>

                    <h4 class="Info">Upload files</h4>
                    <input type="file" class="InpTab" placeholder="Upload files" name='file'>
                </div>
            </div>

            <div style="overflow:auto;">
                <div class="py-3" style="float:right;">
                    <button type="button" id="prevBtn" class="btn btn-successback" onclick="nextPrev(-1)">Back</button>
                    <button type="button" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)">Continue</button>
                </div>
            </div>

            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
    </div>
</section>
@stop


@push('include-js')
<script src="{{ asset('asset/js/Request.js') }}"></script>
@endpush
