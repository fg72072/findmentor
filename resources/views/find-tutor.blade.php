@extends('layouts.app')

@section('title')
Tutor | Find
@stop

@section('header')
@include('includes.header')
@stop


@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/FindTutor.css') }}" class="color-switcher-link">
<link rel="stylesheet" href="{{ asset('asset/css/footer.css') }}">
@endpush



@section('content')
<div class="preloader">
    <div class="preloader_image"></div>
</div>

<section class="flex search_section">
    <h1 class="TutorHead pl-5 pr-5 text-center mt-5">Tutor</h1>
    <hr class="w-25 mx-auto">
    <div class='container flex pt-5'>
        <input class="mr-5 skill" type="text" id="searchInput" name="subject" placeholder="Skill.."
            value="{{ $_GET['subject'] ?? '' }}">
        <div id='submitsearch' class="mr-5">
            <span>Search</span>
        </div>
        <input type="text" id="searchInput" name="location" placeholder="Location.." class="location">
        <div id='submitsearch'>
            <span>Search</span>
        </div>

    </div>
    <div style="text-align: center;">
        <button type="button" class="btn btn-primary  mt-5 FindBtn">Find</button>
    </div>
</section>

<section class="search_section bottom_shadow">
    <div class="container categories">
        <ul class="nav nav-tabs">
            <li><a href="javascript:void(0)" class="active">All</a></li>
            <li><a href="javascript:void(0)" class="online-tutors">Online</a></li>
            <li><a href="javascript:void(0)" class="home-tutors">Home</a></li>
            <li><a href="javascript:void(0)" class="assignment-tutors">Assignment</a></li>
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
<section class="ls s-py-60 s-pt-lg-100 s-pb-lg-70 search_section">
    <div class="content row set_tutor_list m-auto container">

    </div>
</section>
@stop

@push('include-js')



<script>
    $(document).ready(function() {

            renderPosts();
            var search = '';

            $('.categories li a').click(function(e) {
                search = $(this).html();
                renderPosts(search);

                $('.categories li a').removeClass('active')
                $(this).addClass('active')
            });

            $('#Grades').change(function(e) {
                renderPosts();
            });

            $('.FindBtn').click(function(e) {
                renderPosts();
            });


            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                renderPosts(search, page)
            });


            @isset($_GET['search'])
                $('.{{ $_GET['search'] }}-tutors').click()
            @endisset

        });

        function renderPosts(search = '', page = 1) {

            $.LoadingOverlay("show");

            let location = $('.location').val();
            let subject = $('.skill').val();
            let online_tutor = ''
            let home_tutor = ''
            let assignment_tutor = ''
            let level = $('#Grades').val();

            if (search == 'All') {
                online_tutor = ''
                home_tutor = ''
                assignment_tutor = ''
            }
            if (search == 'Home') {
                home_tutor = 'yes'
            }
            if (search == 'Online') {
                online_tutor = 'yes'
            }
            if (search == 'Assignment') {
                assignment_tutor = 'yes'
            }

            $.ajax({
                url: "{{ route('findtutorlist') }}" + "?page=" + page,
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
                    $('.set_tutor_list').html(response)
                    $.LoadingOverlay("hide");
                },
            });
        }
</script>
@endpush
@section('footer')
@include('includes.footer')
@stop
