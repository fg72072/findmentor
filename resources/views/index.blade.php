@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<!-- Home Page Styling -->
<link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
<!-- Home Page Styling -->
@endpush

@section('content')

<section>
    <div class="FrontPage">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="frontPageContent">
                            <h1 class="display-4 pt-3">
                                Free online courses from the experts
                            </h1>
                            <p class="pt-3">
                                We are proud to say that since our opening in ’98
                            </p>
                            <hr class=" line w-25 mx-1">

                            <form action="{{route('findtutor')}}" method="get">
                                <div class="skillbutton">
                                    <input class="InputTab mt-2 flex pl-2" id="BorderBott" placeholder="Find Skill"
                                        name='subject'>
                                    <button type="submit" class="btn btn-primary btn-lg mt-2 ml-2">Find a
                                        Course</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="frontImage">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Frontpage Code End -->




<section>
    <div class="container">
        <div class="servicesHeading">
            <p class="services text-center text-capitalize pt-5">Empower Yourself</p>
            <hr class="w-25 mx-auto">
            <h1 class="display-4 pl-5 pr-5 text-center IT font-weight-bold">Popular categories</h1>
        </div>
        <div class="services">
            <div class="row pt-5">

                <div class="Serv1 col-lg-3 col-md-4  col-12 mb-4  ">
                    <div class="card ServCard ServCard1 ">

                        <div class="card-body">

                            <p class="card-text  Servtext">Unlock growth Online</p>
                            <h3>Science</h3>
                        </div>
                    </div>

                </div>
                <div class="Serv1 col-lg-3 col-md-4 col-12 mb-4">
                    <div class="card ServCard ServCard2 ">

                        <div class="card-body">

                            <p class="card-text  Servtext">Unlock growth Online</p>
                            <h3>Maths</h3>
                        </div>
                    </div>
                </div>
                <div class="Serv1 col-lg-3 col-md-4 col-12 mb-4">
                    <div class="card ServCard ServCard3 ">

                        <div class="card-body">
                            <p class="card-text  Servtext">Unlock growth Online</p>
                            <h3>Business</h3>
                        </div>
                    </div>
                </div>
                <div class="Serv1 col-lg-3 col-md-4 col-12 mb-4">
                    <div class="card ServCard ServCard4 ">

                        <div class="card-body">

                            <p class="card-text Servtext">Unlock growth Online</p>
                            <h3>Technology</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Code End -->

<!-- Video Code Start -->

<section class="my-5">
    <div class="container ">
        <div class="servicesHeading">
            <p class="services text-center text-capitalize pt-5">Empower Yourself</p>
            <hr class="w-25 mx-auto">
            <h1 class="display-4 pl-5 pr-5 text-center IT font-weight-bold">What We Do</h1>
        </div>
        <div class="row pt-5">
            <div class="col-lg-6 col-md-12 col-12 mb-4">

                <div class="growBusiness">
                    <img width="500" height="400" src='{{asset("asset/images/pexels-photo-3755710.jpeg")}}'
                        class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 pt-5">
                <div class="lower2 pl-5">
                    <h1 class="display-4  text-start businessHead ">Just Take Our <br>Teachers</h1>
                    <p class="businessPara pt-3">Naxly bring the power of data science and artificial intelligence to
                        every
                        business.

                        We are proud to say that since our opening in ’98 in the best possible way.
                    </p>
                    <a href="./FindTutor.html">
                        <button type="button" class="btn btn-primary btn-lg mt-2">Find Course</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@push('include-js')
{{-- <script src="{{ asset('asset/js/index.js') }}"></script> --}}
@endpush

@section('footer')
@include('includes.footer')
@stop
