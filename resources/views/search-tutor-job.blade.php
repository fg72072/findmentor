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
            <input class="mr-5" type="text" id="searchInput" placeholder="Skill.." name="skills" @if
                (isset($params['skills']) ) value="{{ $params['skills']}}" @endif>
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
            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
            <li><a data-toggle="tab" href="#menu1">Online</a></li>
            <li><a data-toggle="tab" href="#menu2">Home</a></li>
            <li><a data-toggle="tab" href="#menu3">Assignment</a></li>
            <li>
                <select name="cars" id="Grades" class="level">
                    <option value="" disabled selected>Level</option>
                    <option value="Grade1">Beginner</option>
                    <option value="Grade2">Intermediate</option>
                    <option value="Grade4">Expert</option>
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
                <div class="col-12 col-md-12">
                    <div class="h-100 bordered rounded">
                        <div class="course-front">
                            <div class="vertical-item mt-5 ml-5 mr-5">
                                <div class="item-content">
                                    <a href="{{route('show_tutor_job',['id'=>$item->request_tutors_id])}}">
                                        <h4 class="title">{{$item->subject}} teacher needed in {{$item->location}}</h4>
                                    </a>
                                    <p class="subject pt-3">Contact {{$item->name}}</p>
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
@stop
