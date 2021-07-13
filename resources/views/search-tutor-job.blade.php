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
    <div class='container flex pt-5'>
        <input class="mr-5 skill" type="text" id="searchInput" placeholder="Skill.." name="subject"
            @if(isset($_GET['skills']) ) value="{{ $_GET['skills']}}" @endif>
        <div id='submitsearch' class="mr-5">
            <span>Search</span>
        </div>
        <input type="text" id="searchInput" placeholder="Location.." name='location' class="location">
        <div id='submitsearch'>
            <span>Search</span>
        </div>
    </div>
    <div style="text-align: center;">
        <button type="button" class="btn btn-primary  mt-5 FindBtn">Find Course</button>
    </div>
</section>
<section>
    <div class="container categories">
        <ul class="nav nav-tabs">
            <li><a href="javascript:void(0)" class="active">All</a></li>
            <li><a href="javascript:void(0)">Online</a></li>
            <li><a href="javascript:void(0)">Home</a></li>
            <li><a href="javascript:void(0)">Assignment</a></li>
            <li>
                <select name="cars" id="Grades" class="level">
                    <option value="" disabled selected>Level</option>
                    <option value="begginer">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="expert">Expert</option>
                </select>
            </li>
        </ul>
    </div>
</section>
<section class="col-12">
    <div class="content row set_requirements container m-auto">

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

        renderPosts();

        var token = $('meta[name="csrf-token"]').attr('content');

        $('.categories li a').click(function(e){
            search = $(this).html();
            renderPosts(search);

            $('.categories li a').removeClass('active')
            $(this).addClass('active')
        });

        $('#Grades').change(function(e){
            renderPosts();
        });

        $('.FindBtn').click(function(e){
            renderPosts();
        });

        $(document).on('click','.contact_student',function(){

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


    function renderPosts(search='') {

        let location =$('.location').val();
        let subject =$('.skill').val();
        let online_tutor =''
        let home_tutor = ''
        let assignment_tutor =''
        let level = $('#Grades').val();

        if(search == 'All'){
            online_tutor =''
            home_tutor = ''
            assignment_tutor =''
        }
        if(search == 'Home'){
            home_tutor = 'yes'
        }
        if(search == 'Online'){
            online_tutor = 'yes'
        }
        if(search == 'Assignment'){
            assignment_tutor = 'Assignment Help'
        }

        $.ajax({
            url: "{{route('find.tutor.job')}}",
            type: 'GET',
            data: {
                location,
                subject,
                online_tutor,
                home_tutor,
                assignment_tutor,
                level,
            },
            success: function(response) {
                $('.set_requirements').html(response)

                // $('.set_requirements').html(`<div class="text-center" id="noRecordFoundOnSearchDiv" style="">
	            //         No tutors found for your search. Please <a href="https://www.teacheron.com/post-requirement">Post your requirement</a>  so teachers can contact you directly.
	            //         <a class="btn btn-primary margin-top-30 btn-u-lg" href="https://www.teacheron.com/post-requirement">Post your Requirement</a>
	            //     </div>`)
            },
        });
    }

</script>
@endpush
