@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/TutorProfile.css') }}">
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
                                            <p class="text-justify">I'm CMA final student. I have completed my
                                                graduation from MG.
                                                University kottayam with 85%. I have completed my CMA
                                                intermediate in first attempt itself with 65%. I'm now doing my
                                                final. My core area is accountancy. I have scored a markable
                                                score in accountancy. I'm good in all accounting branch like
                                                financial, costing and management. My next strong subject is
                                                business studies. Both of these can be handled by me with an
                                                ease. I can also handle company accounts ( new format). I will
                                                be also helping in home work and assignments.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around">
                                    <div class="col-lg-5 col-md-5 exp" style="background:#16a085;">
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
                                    <div class="col-lg-5 col-md-5 exp" style="background:#16a085;">
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
                                    <div class="col-lg-5 col-md-5 exp" style="background:#4765a0;">
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
                                    <div class="col-lg-5 col-md-5 exp" style="background:#4765a0;">
                                        <span class="fa fa-money">
                                            <h3>Fee details</h3>
                                        </span>
                                        <div class="subjects">
                                            <h6>₹</h5>
                                                <p> {{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}}
                                                    (US${{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}})
                                                </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 exp" style="background:#16a085;">
                                        <span class="fa fa-thumbs-up">
                                            <h3>Reviews</h3>
                                        </span>
                                        <div class="subjects"> <a>No reviews yet. Be the first one to <a href="#">review
                                                    this tutor.</a></div>
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
                                    <div class="alert alert-danger d-none">

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

                                        <li>
                                            <span class="sidepanel">
                                                <i class="fas fa-sign-in-alt mr-2"></i>
                                                <b>Last login:</b>
                                                {{\App\Common::changeDate($data->last_login_at)}}</span>
                                        </li>

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

@stop


@push('include-js')
<script src="{{ asset('asset/js/Account.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.message').click(()=>{
            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{route('contact_user')}}",
                type: 'POST',
                async: true,
                data: { _token: token, other_user_id: '{{$data->id}}'  },
                success: function(response) {
                    console.log(response)
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


        $('.pay').click(()=>{
          alert();
            // var token = $('meta[name="csrf-token"]').attr('content');

            // $.ajax({
            //     url: "{{route('contact_user')}}",
            //     type: 'POST',
            //     async: true,
            //     data: { _token: token, other_user_id: '{{$data->id}}'  },
            //     success: function(response) {
            //         console.log(response)
            //     },
            //     error: function(error) {
            //         if(error.status == 403){
            //             $('.alert').removeClass('d-none')
            //             $('.alert').html(`User is not <a href="{{route('home')}}">logged in</a>.`)
            //             // $('.alert').html(error.responseJSON.message)
            //         }
            //     }
            // });
        })

        $('.phone').click(()=>{
          alert();
        })

        $('.review').click(()=>{
          alert();
        })
    })
</script>



@endpush
