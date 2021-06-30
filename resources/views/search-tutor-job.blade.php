@extends('layouts.app')

@section('title')
Search Tutor Job
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/FindTutor.css') }}" class="color-switcher-link">
@endpush

@section('content')
<div class="preloader">
    <div class="preloader_image"></div>
</div>
<section class="flex ">
    <h1 class="TutorHead pl-5 pr-5 text-center mt-5">ALL Tutor</h1>
    <hr class="w-25 mx-auto">
    <form action="" method="get">
        <div class='container flex pt-5'>
            <input class="mr-5" type="text" id="searchInput" placeholder="Skill.." name="subject"
                @if(isset($params['subject']) ) value="{{ $params['subject']}}" @endif>
            <div id='submitsearch' class="mr-5">
                <span>Search</span>
            </div>
            <input type="text" id="searchInput" placeholder="Location.." name='location' @if (isset($params['location'])
                ) value="{{ $params['location']}}" @endif>
            <div id='submitsearch'>
                <span>Search</span>
            </div>
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary  mt-5 FindBtn">Find Course</button>
        </div>
    </form>
</section>
<section>
    <div class="container categories">
        <ul class="nav nav-tabs">
            <li><a href="javascript:void(0)">All</a></li>
            <li><a href="javascript:void(0)">Online</a></li>
            <li><a href="javascript:void(0)">Home</a></li>
            <li><a href="javascript:void(0)">Assignment</a></li>
            <li>
                <select name="cars" id="Grades" class="level">
                    <option value="" disabled selected>Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Expert">Expert</option>
                </select>
            </li>
        </ul>
    </div>
</section>
<section class="ls s-py-60 s-pt-lg-100 s-pb-lg-70">
    <div class="container content">
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active show">
                @if (count($data)>0)
                @foreach ($data as $item)
                @php
                $subjects = explode(",",$item->subject);
                @endphp
                <div
                    class="col-12 col-md-12 all @if ( $item->online_class == 'yes') online_available @endif @if ( $item->help_type == 'Assignment Help') home_assignment @endif @if ( $item->class_at_student_place == 'yes' || $item->class_at_tutor_place == 'yes' ) class_at_home @endif {{$item->grade_level}}">
                    <div class="h-100 bordered rounded">
                        <div class="course-front">
                            <div class="vertical-item mt-5 ml-5 mr-5">
                                <div class="item-content">
                                    <a href="{{route('show_tutor_job',['id'=>$item->request_tutors_id])}}">
                                        <h4 class="title">{{$item->subject}} teacher needed in {{$item->location}}</h4>
                                    </a>
                                    <a href="javascript:void(0)" class="subject pt-3 contact_student"
                                        data-id='{{$item->request_tutors_student_id}}'
                                        data-requirement='{{$item->request_tutors_id}}'
                                        data-created='{{$item->posted_at}}'>Contact
                                        {{$item->name}}</a>
                                    <div class="tagcloud pt-4">
                                        @foreach ($subjects as $subject)
                                        <a href="?skills={{$subject}}" class="tag-cloud-link Hum"> {{$subject}} </a>
                                        @endforeach
                                    </div>
                                    <div class="listing_desc pt-5">
                                        <p>
                                            {{$item->detail}}
                                        </p>
                                    </div>
                                    <div class="listing_icons pt-5">
                                        <div class="TextIcon">
                                            <span class="fa fa-calendar icons" aria-hidden="true"></span>
                                            <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->posted_at)->diffForHumans()}}
                                            </p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-map-marker icons" aria-hidden="true"></span>
                                            <p>{{$item->location}}</p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-usd icons" aria-hidden="true"></span>
                                            <p>{{$item->budget}}/Week</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
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


{{-- Buy Coin Modal--}}
<div class="modal fade" id="buy-coin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px;">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Please read.</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div>
                    50 coins required to view contact.
                </div>
                You have <span id="remaining_coins"></span> coins.
                <a target="_blank" href="{{route('buyCoin')}}">Buy Coins</a>
            </div>
        </div>
    </div>
</div>
{{-- Buy Coin Modal End --}}
@stop


@push('include-js')
<script>
    $(document).ready(function () {
        var token = $('meta[name="csrf-token"]').attr('content');
        var search = '';
        var request_user_id = '';
        var requirement_id = '';
        var created_at = '';

        $('.categories li a').click(function(e){

            search = $(this).html();

            if(search == 'All'){
                $('.all').show()
            }
            if(search == 'Home'){
                $('.all').hide()
                $('.home_assignment').show()
            }
            if(search == 'Online'){
                $('.all ').hide()
                $('.online_available').show()
            }
        });

        $('#Grades').change(function(e){

            var level = $(this).val();

            $('.all').hide()

            if(level == 'Beginner'){
                $('.begginer').show()
            }
            if(level == 'Intermediate'){
                $('.intermediate').show()
            }
            if(level == 'Expert'){
                $('.expert').show()
            }
            if(search == 'Home'){
                $('.home_assignment').show()
            }
            if(search == 'Online'){
                $('.online_available').show()
            }
        });


        $('.contact_student').click(function(){

            request_user_id = $(this).attr('data-id');
            requirement_id = $(this).attr('data-requirement');
            created_at = $(this).attr('data-created');

            $.ajax({
                url: "{{route('contact_teacher_to_student')}}",
                type: 'POST',
                async: true,
                data: {
                    _token: token,
                    other_user_id: request_user_id,
                    requirement_id: requirement_id,
                    created_at
                },
                success: function(response) {
                    // console.log(response)

                    if(response.message == 'go-to-message'  ){
                        window.location.href = "{{route('job_messages')}}";
                    }

                    if(response.message == 'deduct-coins'  ){
                        $('#coin-confirm').modal('show');
                    }

                    if(response.message == 'buy-coin'  ){
                        $('#buy-coin').modal('show');
                        $('#remaining_coins').html(response.coins)
                    }

                    if(response.message == 'wait for your access'  ){
                        toastr["error"]('Wait for your time');
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
            $.ajax({
                url: "{{route('requirement_create_teacher_to_student')}}",
                type: 'POST',
                async: true,
                data: {
                    _token: token,
                    other_user_id: request_user_id,
                    requirement_id: requirement_id,
                },
                success: function(response) {
                    window.location.href = "view-messages?mThread="+response.mThread;
                },
            });
        })


    });

</script>
@endpush
