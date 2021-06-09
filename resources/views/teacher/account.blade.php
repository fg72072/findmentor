@extends('layouts.app')

@section('title')
  Tutor | Account
@stop

@push('include-css')
   <link rel="stylesheet"  href="{{ asset('asset/css/BillingAddress.css') }}">
   <link rel="stylesheet"  href="{{ asset('asset/css/Account.css') }}">
@endpush

@section('content')

@php

$months = array('January','February','March','April','May','June','July ','August','September','October','November','December');
$levels = array('begginer','intermediate','expert');
$shifts = array('full time','part time','correspondance');
$degree = array('graduation','post graduation','diploma','other');

$teacher        = $data['teacher'];
$subject        = $data['subject'];
$qualification  = $data['qualification'];
$education      = $data['education'];

@endphp

<section>
    <div class="container">
      <p class="text-center text-capitalize pt-5 CoinSubHead">Verify Tutors Account</p>
      <hr class="w-25 mx-auto">
      <h1 class="display-2 pl-5 pr-5 text-center CoinHead">Verify Account</h1>
    </div>

  </section>
  <section>
    <div class="container">
      <form id="regForm" action="{{route('account.create')}}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="progress ProgressBar">
          <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0"
            aria-valuemax="100"></div>
        </div>

        <!-- One "tab" for each step in the form: -->
        <div class="tab">

          <div class="PositionInfo pt-4">
            <h1 class="Info">PERSONAL INFORMATION</h1>
          </div>


          <div class="form pt-5">

            <h4 class="Info">I am</h4>

            <select class="InpTabSelect" name="type">
              <option value="" disabled selected>Please Select</option>
              <option value="individual" @if(@$teacher->type == 'individual') selected @endif >Indiviual Teacher</option>
              <option value="company" @if(@$teacher->type == 'company') selected @endif>Company</option>
              <option value="other" @if(@$teacher->type == 'other') selected @endif>Other</option>
            </select>

          </div>

        </div>

        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Basic Details</h1>
          </div>


          <div class="form pt-5">

            <h4 class="Info">Current Role</h4>
            <input class="InpTab" placeholder="Enter Role" name="role" value={{@$teacher->current_role}}>

            <h4 class="Info">Gender</h4>

            <select class="InpTabSelect" name="gender">
              <option value="" disabled selected>Select Gender</option>
              <option value="male" @if(@$teacher->gender == 'male') selected @endif>Male</option>
              <option value="female" @if(@$teacher->gender == 'female') selected @endif>Female</option>
              <option value="other" @if(@$teacher->gender == 'other') selected @endif>Other</option>
            </select>

            <h4 class="Info">Birth Date</h4>
            <input class="InpTab" placeholder="Enter Date" type="date" name="dob" value={{@$teacher->dob}}>

          </div>

        </div>

        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Profile Photo</h1>
          </div>


          <div class="form pt-5">
            <h4 class="Info ">Add Profile Photo</h4>
            <input type="file" class="InpTab pl-3" name="profile">
          </div>

        </div>

        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Subjects You Teach</h1>
          </div>


          <div class="form pt-5">

            <h4 class="Info ">Add Subject</h4>
            <input class="InpTab" placeholder="Enter Subject" name="subject" value={{@$subject->subject}}>

            <h4 class="Info ">From Level</h4>
            <select class="InpTabSelect" name="level_from">
              <option value="" disabled selected>Select Level</option>
              @foreach ($levels as $name)
              <option value="{{$name}}" @if(@$subject->level_from == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <h4 class="Info ">To Level</h4>
            <select class="InpTabSelect" name="level_to">
              <option value="" disabled selected>Select Level</option>
              @foreach ($levels as $name)
              <option value="{{$name}}" @if(@$subject->level_to == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

          </div>

        </div>
        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Address (Publicly Visible)</h1>
          </div>

          <div class="form pt-5">

            <h4 class="Info ">Location</h4>
            <div class="" style="position: relative; width: 100%;">
              <input class="InpTab loc" placeholder="Get Location" name="location" value={{@$teacher->location}}>
              <i class="fas fa-map-marker-alt map" style="font-size: 2rem; position: absolute; left: 95%; top:20%;"></i>
            </div>


            <h4 class="Info">postal Code</h4>

            <input type='text' class="InpTab" placeholder="Enter Postal Code" name="postal_code"  value={{@$teacher->postal_code}}>
            <div class="CheckBoxTitle even">
              <input type="checkbox" class="check" value='no' name="postal_code_available" @if(@!$teacher->postal_code) checked @endif>
              <p class="Info">Don't have postal code ?</p>
            </div>

          </div>

        </div>
        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Education and Certifications</h1>
          </div>


          <div class="form pt-5">

            <h4 class="Info">Institution name with city</h4>
            <input class="InpTab" placeholder="Enter Institution name" name="institute_name"  value={{@$education->institute_name}}>

            <h4 class="Info">Degree Type</h4>

            <select class="InpTabSelect" name="degree_type">
              <option value="" disabled selected>Select Degree</option>
              @foreach ($degree as $name)
              <option value="{{$name}}" @if(@$education->degree_type == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <h4 class="Info">Degree Name</h4>
            <input class="InpTab" placeholder="Enter Degree name" name="degree_name" value={{@$education->degree_name}}>

            <h4 class="Info">Start Date</h4>

            <select class="InpTabSelect" style="width: 30%;" name="education_start_month">
              <option type="month" value="" disabled selected>Select Month</option>
              @foreach ($months as $name)
              <option value="{{$name}}" @if(@$education->start_month == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <select class="InpTabSelect" style="width: 30%;" name="education_start_year">
              <option value="" disabled selected>Select Year</option>
              @for($i = 1999 ; $i <= 2010 ; $i++)
              <option value="{{$i}}" @if(@$education->start_year == $i) selected @endif>{{$i}}</option>
              @endfor
            </select>

            <h4 class="Info">End Date</h4>

            <select class="InpTabSelect" style="width: 30%;" name="education_end_month">
              <option value="" disabled selected>Select Month</option>
              @foreach ($months as $name)
              <option value="{{$name}}"  @if(@$education->end_month == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <select class="InpTabSelect" style="width: 30%;" name="education_end_year">
              <option value="" disabled selected>Select Year</option>
              @for($i = 1999 ; $i <= 2010 ; $i++)
              <option value="{{$i}}" @if(@$education->end_year == $i) selected @endif>{{$i}}</option>
              @endfor
            </select>


            <h4 class="Info">Association</h4>

            <select class="InpTabSelect" name="education_associate">
              <option value="" disabled selected>Select Association</option>
              @foreach ($shifts as $name)
              <option value="{{$name}}"  @if(@$education->associate == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <h4 class="Info">Speciality (Optional)</h4>
            <input class="InpTab" placeholder="Enter Speciality" name="speciality" value={{@$education->speciality}}>

            <h4 class="Info">Score (Optional)</h4>
            <input class="InpTab" placeholder="Enter Score" name="score"  value={{@$education->score}}>

          </div>

        </div>

        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Teaching and Professional Experience</h1>
          </div>

          <div class="form pt-5">

            <h4 class="Info">Organization name with city</h4>
            <input class="InpTab" placeholder="Enter Organization name" name="organization_name"  value={{@$qualification->organization_name}}>

            <h4 class="Info">Designation</h4>
            <input class="InpTab" placeholder="Enter Designation" name="designation" value={{@$qualification->designation}}>

            <h4 class="Info">Degree Name</h4>
            <input class="InpTab" placeholder="Enter Degree name" name="degree_name_experience" value={{@$qualification->degree}}>

            <h4 class="Info">Start Date</h4>
            <select class="InpTabSelect" style="width: 30%;" name="experience_start_month" >
              <option value="" disabled selected>Select Month</option>
              @foreach ($months as $name)
              <option value="{{$name}}" @if(@$qualification->start_month == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <select class="InpTabSelect" style="width: 30%;" name="experience_start_year">
              <option value="" disabled selected>Select Year</option>
              @for($i = 1999 ; $i <= 2010 ; $i++)
              <option value="{{$i}}" @if(@$qualification->start_year == $i) selected @endif>{{$i}}</option>
              @endfor
            </select>

            <h4 class="Info">End Date</h4>

            <select class="InpTabSelect" style="width: 30%;" name="experience_end_month">
              <option value="" disabled selected>Select Month</option>
              @foreach ($months as $name)
              <option value="{{$name}}" @if(@$qualification->end_month == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>

            <select class="InpTabSelect" style="width: 30%;" name="experience_end_year">
              <option value="" disabled selected>Select Year</option>
              @for($i = 1999 ; $i <= 2010 ; $i++)
              <option value="{{$i}}" @if(@$qualification->end_year == $i) selected @endif>{{$i}}</option>
              @endfor
            </select>

            <h4 class="Info">Association</h4>

            <select class="InpTabSelect" name="experience_associate">
              <option value="" disabled selected>Select Association</option>
              @foreach ($shifts as $name)
              <option value="{{$name}}"  @if(@$qualification->associate == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>
            <h4 class="Info">Job Description</h4>
            <input class="InpTab" placeholder="Enter Job Description" name="job_description"  value={{@$qualification->job_description}}>
          </div>

        </div>
        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Teaching Details</h1>
          </div>

          <div class="form pt-5">

            <h4 class="Info">I charge</h4>
            @php
              $charge = array('hourly','daily','weekly','monthly')
            @endphp
            <select class="InpTabSelect" style="float: right;" name="charge_by">
              <option type="month" value="" disabled selected>Select Month</option>
              @foreach ($charge as $name)
              <option value="{{$name}}" @if(@$teacher->fee_charge == $name) selected @endif>{{$name}}</option>
              @endforeach
            </select>


            <h4 class="Info">Minimun Fees</h4>
            <input class="InpTab" placeholder="Enter Minimun" name="min_fee"  value={{@$teacher->min_fee}}>

            <h4 class="Info">Maximun Fees</h4>
            <input class="InpTab" placeholder="Enter Minimun" name="max_fee" value={{@$teacher->max_fee}}>

            <h4 class="Info">Fee Details </h4>
            <input class="InpTab" placeholder="Enter Details of how fee can vary " name='fee_detail' value={{@$teacher->fee_detail}}>


            <h4 class="Info">Years of total experience Teaching and other experience</h4>
            <input class="InpTab" placeholder="0" name='total_experience' value={{@$teacher->total_experience}}>

            <h4 class="Info">Years of total teaching experience (Offline+online)</h4>
            <input class="InpTab" placeholder="0" name="experience_offline_online" value={{@$teacher->total_experience_online_offline}}>

            <h4 class="Info">Years of online teaching experience</h4>
            <input class="InpTab" placeholder="0" name="experience_online" value={{@$teacher->total_experience_online}}>

            <h4 class="Info">Are you willing to travel to Student?</h4>

            <div class="CheckBoxTitle even">
              <input type="radio" class="check" id="yes" name="travel_to_student" value="yes" @if(@$teacher->travel_to_student == 'yes') checked @endif>
              <p for="yes" class="Info">Yes</p>
              <input type="radio" id="no" value='no' name="travel_to_student" class="check" @if(@$teacher->travel_to_student == 'no') checked @endif>
              <p for="no" class="Info">No</p>
            </div>



            <h4 class="Info">Available for online teaching?</h4>

            <div class="CheckBoxTitle even">
              <input type="radio" class="check" id="male" name="online_available" value="yes" @if(@$teacher->online_available == 'yes') checked @endif>
              <p for="male" class="Info">Yes</p>
              <input type="radio" id="female" name="online_available" value="no" class="check" @if(@$teacher->online_available == 'no') checked @endif>
              <p for="female" class="Info">No</p>
            </div>

            <h4 class="Info">Do you have a digital Pen?</h4>

            <div class="CheckBoxTitle even">
              <input type="radio" class="check" id="male" name="digital_pen" value="yes" @if(@$teacher->digital_pen == 'yes') checked @endif>
              <p for="male" class="Info">Yes</p>
              <input type="radio" id="female" name="digital_pen" value="no" class="check" @if(@$teacher->digital_pen == 'no') checked @endif>
              <p for="female" class="Info">No</p>
            </div>

            <h4 class="Info">Do you help with homework and assignments?</h4>

            <div class="CheckBoxTitle even">
              <input type="radio" class="check" id="male" name="give_homework" value="yes" @if(@$teacher->help_with == 'yes') checked @endif>
              <p for="male" class="Info">Yes</p>
              <input type="radio" id="female" name="give_homework" value="no" class="check" @if(@$teacher->help_with == 'no') checked @endif>
              <p for="female" class="Info">No</p>
            </div>

            <h4 class="Info">Are you currently a full time teacher employed by a School/College</h4>

            <div class="CheckBoxTitle even">
              <input type="radio" class="check" id="male" name="full_time_employee" value="yes" @if(@$teacher->full_time_employee == 'yes') checked @endif>
              <p for="male" class="Info">Yes</p>
              <input type="radio" id="female" name="full_time_employee" value="no" class="check" @if(@$teacher->full_time_employee == 'no') checked @endif>
              <p for="female" class="Info">No</p>
            </div>


            <h4 class="Info">Opportunities you are interested in</h4>

            <select class="InpTabSelect" name="opportunity">
              <option value="" disabled selected>Select Association</option>
              <option value="full time" @if(@$teacher->interested_in == 'full time') selected @endif>Full Time</option>
              <option value="part time" @if(@$teacher->interested_in == 'part time') selected @endif>Part Time</option>
              <option value="both" @if(@$teacher->interested_in == 'both') selected @endif>Both</option>
            </select>
          </div>
        </div>

        <div class="tab">
          <div class="PositionInfo pt-4">
            <h1 class="Info">Phone Number</h1>
          </div>

          <div class="form pt-5">
            <h4 class="Info ">Add Phone</h4>
            <input class="InpTab" placeholder="Enter Phone Number" name="phone" value={{@$teacher->phone}}>
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
          <span class="step"></span>
          <span class="step"></span>
        </div>

      </form>
    </div>
  </section>
@stop


@push('include-js')
    <script src="{{ asset('asset/js/Account.js') }}"></script>
@endpush

