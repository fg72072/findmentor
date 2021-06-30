@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/TutorProfile.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/RatingStar.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/tutorProfileRequirementForm.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
@endpush

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" style="margin-bottom: 40px;">
                                    <div class="col-md-12 col-xs-12">
                                        <img src="../asset/profile/{{$data->profile}}" style="max-width: 50%;">
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <h2 class="display-3 card-title pt-3">{{$data->name}}</h2>
                                        <div class="d-flex flex-column flex-lg-row pr-5">
                                            <p class="text-justify">{{$data['info']->description}}</p>
                                        </div>
                                        @if(Auth::user() && Auth::user()->id == $data->id)
                                        @role('teacher')
                                        <div class="top-icons"
                                            style="line-height: 50px; text-align: end; padding-right: 4rem;">
                                            <span data-toggle="modal" data-target="#description"
                                                style="padding-left: 1rem; padding-right: 1.5rem;"
                                                class="fa fa-comment message"><a> Edit
                                                </a></span>
                                        </div>
                                        @endrole
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-around">
                                    <div class="col-lg-11 col-md-11 exp" style="background:#16a085;">
                                        <span class="fa fa-book">
                                            <h3>Subjects</h3>
                                        </span>
                                        <div class="subjects">
                                            @if (count($data['subject'])>0)
                                            @foreach ($data['subject'] as $subject)
                                            <h6>{{ucfirst($subject->subject)}} ({{ucfirst($subject->level_to)}})</h6>
                                            @endforeach
                                            @else
                                            <h6>No Subject mentioned.</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-11 exp" style="background:#4765a0;">
                                        <span class="fa fa-graduation-cap">
                                            <h3>Education</h3>
                                        </span>
                                        <div class="subjects">
                                            @if (count($data['education'])>0)
                                            @foreach ($data['education'] as $education)
                                            <h6>{{ucfirst($education->degree_name)}}</h6>
                                            <p> ({{$education->start_month}},
                                                {{$education->start_year}}-{{$education->end_month}},
                                                {{$education->end_year}}) from {{$education->institute_name}}</p>
                                            @endforeach
                                            @else
                                            <h6>No Education mentioned.</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-11 exp" style="background:#16a085;">
                                        <span class="fa fa-briefcase">
                                            <h3>Experience</h3>
                                        </span>
                                        <div class="subjects">
                                            @if (count($data['experience'])>0)
                                            @foreach ($data['experience'] as $experience)
                                            <h6>{{ucfirst($experience->designation)}}</h6>
                                            <p> ({{$experience->start_month}},
                                                {{$experience->start_year}}-{{$experience->end_month}},
                                                {{$experience->end_year}}) from {{$experience->organization_name}}</p>
                                            @endforeach
                                            @else
                                            <h6>No experience mentioned.</h6>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-lg-11 col-md-11 exp" style="background:#4765a0;">
                                        <span class="fa fa-money">
                                            <h3>Fee details</h3>
                                        </span>
                                        <div class="subjects">
                                            <h6>₹</h6>
                                            <p> {{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}}
                                                (US${{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}})
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-11 exp" style="background:#16a085; height:auto">
                                        <span class="fa fa-thumbs-up">
                                            <h3>Reviews</h3>
                                        </span>
                                        <div class="subjects">
                                            @if (count($data['reviews'])>0)
                                            @foreach ($data['reviews'] as $review)
                                            <div>
                                                <h4>{{\App\User::find($review->user_id)->name}}</h4>
                                                <p>{{ $review->rating}}</p>
                                                <h5>{{ $review->headline}}</h5>
                                                <h6>{{ $review->review}}</h6>
                                            </div>
                                            <hr>
                                            @endforeach
                                            @else
                                            No reviews yet. Be the first one to
                                            <a href="#">review this tutor.</a>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <div class="wrapper">
                                    <div class="alert alert-danger d-none text-center">

                                    </div>
                                    <div class="top-icons" style="line-height: 50px;">
                                        <span class="fa fa-comment message"><a
                                                href="javascript:void(0)">Message</a></span>
                                        <span class="fa fa-phone phone pl-4 pr-4 phone"><a
                                                href="javascript:void(0)">Phone</a></span>
                                        <br>
                                        <span class="fa fa-money pay pl-4 pr-4 pay"><a href="javascript:void(0)"> Pay
                                            </a></span>
                                        <span class="fa fa-star-o review pl-4 pr-4 review"><a
                                                href="javascript:void(0)">Review</a></span>
                                    </div>

                                    <ul>
                                        <li>
                                            <span class="sidepanel">
                                                <i class="fas fa-map-marker-alt mr-2"></i>
                                                {{$data['info']->location}} </span>
                                        </li>
                                        <li>
                                            <span class="sidepanel">
                                                <i class="fas fa-car mr-2"></i>
                                                <b>Can travel:</b> {{$data['info']->travel_to_student}}</span>
                                        </li>
                                        @isset($data->last_login_at)
                                        <li>
                                            <span class="sidepanel">
                                                <i class="fas fa-sign-in-alt mr-2"></i>
                                                <b>Last login:</b>
                                                {{\App\Common::changeDate($data->last_login_at)}}</span>
                                        </li>
                                        @endisset

                                        <li>
                                            <span class="sidepanel">
                                                <i class="fas fa-user mr-2"></i>
                                                <b>Registered:</b>
                                                {{\App\Common::changeDate($data->is_account_verified_at)}}</span>
                                        </li>
                                        <li>
                                            <span class="idepanel">
                                                <i class="fas fa-tachometer-alt mr-2"></i>
                                                <b>Total Teaching exp:</b> {{$data['info']->total_experience}}
                                                yrs.</span>
                                        </li>
                                        <li><span class="sidepanel">
                                                <i class="fas fa-wifi mr-2"></i>
                                                <b>Teaches online:</b> {{$data['info']->online_available}}</span></li>
                                        <li><span class="sidepanel">
                                                <i class="fas fa-wifi mr-2"></i>
                                                <b>Online Teaching exp:</b> {{$data['info']->total_experience_online}}
                                                yrs.</span></li>

                                        <li><span class="sidepanel">
                                                <i class="fas fa-home mr-2"></i>
                                                <b>Teaches at student's home:</b>
                                                {{$data['info']->travel_to_student}}</span></li>
                                        <li><span class="sidepanel">
                                                <i class="fas fa-book mr-2"></i>
                                                <b>Homework Help:</b> {{$data['info']->help_with}}</li>
                                        <li><span class="sidepanel">
                                                <i class="fas fa-money-bill-alt mr-2"></i>
                                                <b>Fee:</b>
                                                Rs{{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}}
                                                (USD
                                                {{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}})</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Buy Coin Modal --}}
<section>
    <div class="modal fade" id="make-requirement">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body flex">
                    <form id="regForm" action="{{route('requirement.create',['id'=>$data->id])}}" method='POST'
                        enctype="multipart/form-data">
                        @csrf()

                        <div class="progress ProgressBar">
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
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
                                <button type="button" id="prevBtn" class="btn btn-successback"
                                    onclick="nextPrev(-1)">Back</button>
                                <button type="button" id="nextBtn" class="btn btn-success"
                                    onclick="nextPrev(1)">Continue</button>
                            </div>
                        </div>

                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                        {{-- <button type="submit">Save</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Buy Coin Modal End --}}


{{-- Coin Deduction Confirmation Modal --}}
<div class="modal fade" id="coin-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px;">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Please read. It's important.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div>
                    <p style="display: none" id="acceptTermsAndCondTutorPhnNotVerified"><b>This tutor's phone is not
                            verified. IT MAY BE WRONG.</b></p>
                    <p id="acceptTermsAndCondDeductCoinMsg" style=""> <b>50 coins will be deducted</b> to contact this
                        tutor.</p>
                    <p>Please read our tips on how to <a target="_blank" href="/stay-safe">stay safe</a>.</p>
                    <p>By contacting this tutor, you agree to our <a target="_blank" href="/terms-and-conditions">terms
                            and conditions</a>.</p>
                    <div id="studentContactDetailsDiv" style="display: none">
                        <p>Following details will be shared with the tutors you will contact:</p>
                        <ul id="studentContactDetailsToBeShared"
                            class="list-unstyled vertical-list margin-top-10 margin-left-10-"></ul>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary acceptCoinOffer">Accept</button>
                <a class="btn btn-danger btn-ok" data-dismiss="modal">Reject</a>
            </div>
        </div>
    </div>
</div>
{{-- Coin Deduction Confirmation Modal End --}}


{{-- Requirements Modal --}}
<div class="modal fade" id="requirement-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Message {{$data->name}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{route('requirement.create',['id'=>$data->id])}}" id="previousPostForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <section>
                                <select class="form-control" name="requirement_id" id="requirement_id">
                                    <option value="" disabled selected>-- Select a post --</option>
                                    @if (isset($requirements) && count($requirements)>0)
                                    @foreach ($requirements as $item)
                                    <option value="{{$item->id}}">{{$item->detail}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </section>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <section>
                                <button id="btnContactUsingPreviousPost" type="submit"
                                    class="btn btn-primary w-100">Submit</button>
                            </section>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <center>------------ OR --------------- </center>
                            <br>
                        </div>
                    </div>

                    <div class="row margin-top-20">
                        <div class="col-md-12">
                            <section>
                                <button id="btnContactUsingNewPost" type="button" class="btn btn-success w-100">Contact
                                    for new requirement
                                </button>
                            </section>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Requirements Modal End --}}



{{--  Phone Modal --}}
<div class="modal fade" id="phone-verification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">{{$data->name}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p id="mobile_msg_box"></p>
            </div>
        </div>
    </div>
</div>
{{-- Phone Modal End --}}


{{--  Payment Modal --}}
<div class="modal fade" id="payment-verification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">{{$data->name}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p id="payment_msg_box"></p>
            </div>
        </div>
    </div>
</div>
{{-- Payment Modal End --}}

{{--  Review Modal --}}
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center"><strong>Rate & Review</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="{{route('review_create')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label">Rating</label>
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4half" name="rating" value="4.5" />
                                <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3half" name="rating" value="3.5" />
                                <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2.5" />
                                <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1.5" />
                                <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="starhalf" name="rating" value="0.5" />
                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                <input type="radio" class="reset-option" name="rating" value="reset" />
                            </fieldset>

                            <input type="hidden" name="other_user_id" value="{{$data->id}}">

                            <section>
                                <label class="label d-block">Add a headline</label>
                                <input type="text" autocomplete="off" placeholder="What's most important to know?"
                                    name="reviewHeading" id="reviewHeading" name="reviewHeading" class="form-control">
                                <span style="display: none" id="reviewHeadingCount">100 characters left.</span>
                                <div id="reviewHeadingErrorMsg"></div>
                            </section>
                            <br>
                            <section>
                                <label class="label d-block">Write your review</label>
                                <textarea class="form-control" rows="4" name="userReview"
                                    placeholder="What did you like or dislike? What were the results?" name="userReview"
                                    id="userReview" style="resize: none;"></textarea>
                                <span style="display: none" id="userReviewCount">2500 characters left.</span>
                                <div id="reviewErrorMsg"></div>
                                <div id="reviewEscalateReason" style="display: none"
                                    class="alert alert-warning fade in"></div>
                            </section>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn_submitReview" class="btn btn-primary"><span
                                id="btnLabelSaveOrUpdateReview">
                                Rate and Review</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Review Modal End --}}


{{--  Add Discription Modal --}}
<div class="modal fade" id="description" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center"><strong>Description</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="{{route('description_create')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"
                                placeholder="Description..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Add Discription Modal End --}}




@stop


@push('include-js')
<script src="{{ asset('asset/js/Account.js') }}"></script>

<script>
    $(document).ready(function () {
        var token = $('meta[name="csrf-token"]').attr('content');

        $('.message').click(()=>{
            $('.alert').addClass('d-none')
            $('.alert').html('');
            $.ajax({
                url: "{{route('contact_user')}}",
                type: 'POST',
                async: true,
                data: { _token: token, other_user_id: '{{$data->id}}'  },
                success: function(response) {
                    console.log(response)

                    if(response.message == 'go-to-message'  ){
                        window.location.href = "{{route('job_messages')}}";
                    }

                    if(response.message == 'deduct-coins'  ){
                        $('#coin-confirm').modal('show');
                    }

                    if(response.message == 'buy-coin'  ){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`
                        <div>
                            50 coins required to view contact.
                        </div>
                        You have ${response.coins} coins.
                        <a target="_blank" href="{{route('buyCoin')}}">Buy Coins</a>
                        `)
                    }

                },
                error: function(error) {
                    if(error.status == 403){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`User is not <a href="{{route('home')}}">logged in</a>.`)
                        // $('.alert').html(error.responseJSON.message)
                    }

                }
            });
        })

        $('.phone').click(()=>{
            $('.alert').addClass('d-none')
            $('.alert').html('');
            $.ajax({
                url: "{{route('user_phone')}}",
                type: 'POST',
                async: true,
                data: { _token: token, other_user_id: '{{$data->id}}'  },
                success: function(response) {
                    console.log(response)

                    if(response.message == 'phone-not-verified'  ){
                        $('#phone-verification').modal('show');
                        $('#mobile_msg_box').html('User Cannot give access publicly');
                    }

                    if(response.message == 'show-number'  ){
                        $('#phone-verification').modal('show');
                        $('#mobile_msg_box').html(response.phone);
                    }

                    if(response.message == 'deduct-coins'  ){
                        $('#coin-confirm').modal('show');
                    }

                    if(response.message == 'buy-coin'  ){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`
                        <div>
                            50 coins required to view contact.
                        </div>
                        You have ${response.coins} coins.
                        <a target="_blank" href="{{route('buyCoin')}}">Buy Coins</a>
                        `)
                    }

                },
                error: function(error) {
                    if(error.status == 403){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`User is not <a href="{{route('home')}}">logged in</a>.`)
                    }

                }
            });

        })

        $('.pay').click(()=>{
            $('.alert').addClass('d-none')
            $('.alert').html('');
            $.ajax({
                url: "{{route('user_payment')}}",
                type: 'POST',
                async: true,
                data: { _token: token, other_user_id: '{{$data->id}}'  },
                success: function(response) {
                    console.log(response)

                    if(response.message == 'payment-not-verified'  ){
                        $('#payment-verification').modal('show');
                        $('#payment_msg_box').html('User Payment Not verified');
                    }
                },
                error: function(error) {
                    if(error.status == 403){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`User is not <a href="{{route('home')}}">logged in</a>.`)
                    }

                }
            });
        })


        $('.review').click(()=>{
            $('.alert').addClass('d-none')
            $('.alert').html('');
            $.ajax({
                url: "{{route('user_review')}}",
                type: 'POST',
                async: true,
                data: { _token: token, other_user_id: '{{$data->id}}'  },
                success: function(response) {
                    console.log(response)

                    if(response.message == 'show-review-box'  ){
                        $('#review').modal('show');
                    }

                    if(response.message == 'dont-show-review-box'  ){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`<div id="contactFlowByAjaxError" class="alert alert-danger-light margin-top-10" style=""><i class="fas fa-exclamation-triangle"></i> You have not paid this tutor via Find-Mentor. Please pay this tutor to give a review to this teacher.</div>`)
                    }
                },
                error: function(error) {
                    if(error.status == 403){
                        $('.alert').removeClass('d-none')
                        $('.alert').html(`User is not <a href="{{route('home')}}">logged in</a>.`)
                    }

                }
            });
        })


        $('.acceptCoinOffer').click(()=>{
            $('#coin-confirm').modal('toggle')
            $('#requirement-modal').modal('show')
        })

        $('#btnContactUsingNewPost').click(()=>{
            $('#requirement-modal').modal('hide')
            $('#make-requirement').modal('show')
        })


        var maxLength = 50;
        $('#requirement_id > option').text(function(i, text) {
            if (text.length > maxLength) {
                return text.substr(0, maxLength) + '...';
            }
        });

    })

</script>



@endpush
