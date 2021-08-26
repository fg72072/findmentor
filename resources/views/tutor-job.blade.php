@extends('layouts.app')

@section('title')
Tutor Job
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/FindTutor.css') }}" class="color-switcher-link">
<link rel="stylesheet" href="{{ asset('asset/css/footer.css') }}">
@endpush

@section('content')
<section>
    <div class="container" style="height: 100vh">
        <div>
            <div>
                @php
                $subjects = explode(',', $item->subject);
                @endphp
                <div>
                    <div class="h-100 bordered rounded">
                        <div class="course-front">
                            <div class="vertical-item mt-5 ml-5 mr-5">
                                <div class="item-content">
                                    <h4 class="title">{{ $item->subject }} teacher needed in {{ $item->location }}
                                    </h4>
                                    {{-- <p class="subject pt-3">Contact {{$item->name}}</p> --}}
                                    <div class="tagcloud pt-4">
                                        @foreach ($subjects as $subject)
                                        <a href="{{ route('findtutor', ['subject' => $subject]) }}"
                                            class="tag-cloud-link Hum"> {{ $subject }} </a>
                                        @endforeach
                                    </div>
                                    <div class="listing_desc pt-5">
                                        <p>
                                            {{ $item->detail }}
                                        </p>
                                    </div>
                                    <div class="listing_icons pt-5">
                                        <div class="TextIcon">
                                            <span class="fa fa-calendar icons" aria-hidden="true"></span>
                                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->posted_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-map-marker icons" aria-hidden="true"></span>
                                            <p>{{ $item->location }}</p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-usd icons" aria-hidden="true"></span>
                                            <p>{{ $item->budget }}/Week</p>
                                        </div>
                                    </div>
                                    <div class="listing_icons pt-5">
                                        <div class="TextIcon">
                                            <span class="fa fa-signal icons" aria-hidden="true"></span>
                                            <p>{{ $item->grade_level }}</p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-map-marker icons" aria-hidden="true"></span>
                                            <p>{{ $item->working_type }}</p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-user icons" aria-hidden="true"></span>
                                            <p>{{ $item->name }}</p>
                                        </div>
                                    </div>
                                    <div class="listing_icons pt-5">
                                        <div class="TextIcon">
                                            <span class="fa fa-mobile icons" aria-hidden="true"></span>
                                            <p>{{ $item->phone_verified == 0 ? 'Not Verified' : '+92-**********' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="listing_icons pt-5">
                                        <div class="TextIcon">
                                            <span class="fa fa-mars-stroke icons" aria-hidden="true"></span>
                                            <p>{{ $item->gender_preference }}</p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-wifi icons" aria-hidden="true"></span>
                                            <p>{{ $item->online_class == 'yes' ? 'Available online' : 'Not Available' }}
                                            </p>
                                        </div>
                                        <div class="TextIcon">
                                            <span class="fa fa-home icons" aria-hidden="true"></span>
                                            <p>{{ $item->class_at_student_place == 'yes' ? 'Available for home tutoring' : 'Not Available for home tutoring' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="listing_icons pt-5">
                                        <div class="TextIcon">
                                            <span class="fa fa-car icons" aria-hidden="true"></span>
                                            <p>{{ $item->class_at_tutor_place == 'yes' ? 'Travel' : 'Can not travel' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('footer')
@include('includes.footer')
@stop
