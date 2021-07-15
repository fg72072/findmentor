@extends('layouts.app')

@section('title')
    Tutor | Home
@stop

@section('header')
    @include('includes.header')
@stop

@push('include-css')
    <!-- Home Page Styling -->
    <link rel="stylesheet" href="{{ asset('asset/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/pricing.css') }}">
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
                                @php
                                    $route = route('findtutor');
                                @endphp
                                @role('student')
                                @php
                                    $route = route('findtutor');
                                @endphp
                                @endrole
                                @role('teacher')
                                @php
                                    $route = route('tutor_job');
                                @endphp
                                @endrole
                                <form action="{{ $route }}" method="get">
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

    <div class=" tags-v2 col-xs-12 margin-bottom-10 text-center margin-top-20 mt-5">
        <style>
            .block-tag-custom {
                color: #7a7e82;
                padding: 5px 0px;
                border: solid 1px #bbb;
                width: 100%;
                font-size: 18px;
                font-weight: 400;
                font-family: 'Montserrat', sans-serif;
            }

        </style>
        <div class="col-xs-12 col-md-6" style="max-width:490px;  display:inline-block; float:none;">
            <div class="tag-box tag-box-v3 "
                style="border-bottom: 1px solid #ebebeb; border:none; padding: 0px 10px 20px 10px;">
                <div class="">
                    <h2 class="color-blue margin-top-20" style=""><strong class="h1" style="">Teachers</strong></h2>
                </div>
                <div class="row">
                    <div class="col-sm-6"><span class="line-height-25"><a
                                class="block-tag-custom  btn-u- btn-block btn-u-sea- margin-bottom-10 rubberBand"
                                href="{{ url('find-tuto') }}">Teachers</a></span></div>
                    <div class="col-sm-6"><span class="line-height-25"><a
                                class="block-tag-custom btn-u- btn-block btn-u-blue margin-bottom-10"
                                href="/online-tutors">Online Teachers</a></span></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 "><span class="line-height-25"><a
                                class="block-tag-custom btn-u- btn-block btn-u-blue margin-bottom-10"
                                href="/home-tutors">Home
                                Teachers </a></span></div>
                    <div class="col-sm-6 "><span class="line-height-25"><a
                                class="block-tag-custom btn-u- btn-block btn-u-sea margin-bottom-10"
                                href="/assignment-tutors">Assignment Help</a></span></div>
                </div>
                <div class="clear-both"></div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6" style="max-width:490px; display:inline-block; float:none;">
            <div class="tag-box tag-box-v3 "
                style="border-bottom: 1px solid #ebebeb; border:none; padding: 0px 10px 20px 10px;">
                <div class="">
                    <h2 class="color-blue	 margin-top-20" style=""><strong class="h1">Teaching Jobs</strong></h2>
                </div>
                <div class="row">
                    <div class="col-sm-6"><span class="line-height-25"><a
                                class="block-tag-custom btn-block btn-u-sea margin-bottom-10" href="/tutor-jobs">Teaching
                                Jobs</a></span></div>
                    <div class="col-sm-6"><span class="line-height-25"><a
                                class="block-tag-custom btn-block btn-u-blue margin-bottom-10"
                                href="/online-tutor-jobs">Online
                                Teaching</a></span></div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><span class="line-height-25"><a
                                class="block-tag-custom btn-block btn-u-blue margin-bottom-10" href="/home-tutor-jobs">Home
                                Teaching </a></span></div>
                    <div class="col-sm-6"><span class="line-height-25"><a
                                class="block-tag-custom btn-block btn-u-sea margin-bottom-10"
                                href="/assignment-tutor-jobs">Assignment Jobs</a></span></div>
                </div>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>


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
                        <img width="500" height="400" src='{{ asset('asset/images/pexels-photo-3755710.jpeg') }}'
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="lower2 pl-5">
                        <h1 class="display-4  text-start businessHead ">Just Take Our <br>Teachers</h1>
                        <p class="businessPara pt-3">Naxly bring the power of data science and artificial intelligence to
                            every
                            business.

                            We are proud to say that since our opening in ’98 in the best possible way.
                        </p>

                        <a href="{{ $route }}">
                            <button type="button" class="btn btn-primary btn-lg mt-2">Find Course</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="demo">
            <div class="container">
                <div class="servicesHeading mb-5">
                    <p class="services text-center text-capitalize pt-5">Empower Yourself</p>
                    <hr class="w-25 mx-auto">
                    <h1 class="display-4 pl-5 pr-5 text-center IT font-weight-bold">Pricing</h1>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <h3 class="heading mb-3">Standard</h3>
                                {{-- <span class="subtitle">Lorem ipsum dolor sit amet</span> --}}
                                <div class="price-value">10
                                    <span class="currency">$</span>
                                    <span class="month">/mo</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>5000 Coins</li>
                            </ul>
                            <a href="#" class="read">Buy<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <h3 class="heading mb-3">Business</h3>
                                {{-- <span class="subtitle">Lorem ipsum dolor sit amet</span> --}}
                                <div class="price-value">20
                                    <span class="currency">$</span>
                                    <span class="month">/mo</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>6000 Coins</li>
                            </ul>
                            <a href="#" class="read">Buy<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <h3 class="heading mb-3">Premium</h3>
                                {{-- <span class="subtitle">Lorem ipsum dolor sit amet</span> --}}
                                <div class="price-value">30
                                    <span class="currency">$</span>
                                    <span class="month">/mo</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>7000 Coins</li>
                            </ul>
                            <a href="#" class="read">Buy<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .top-subjects-list li {
            width: 250px;
            text-align: left;
            color: #7a7e82;
            font-weight: normal;
            margin-bottom: 5px;
            max-width: 100%;
        }

        .top-subjects-list {
            text-align: center;
        }

        .container {
            width: 92.5%;
        }

        .list-inline li {
            display: inline-block;
        }

        .list-inline li a {
            line-height: 1.5rem;
        }

    </style>
    <div class="container content">
        <h2 class="text-center" style="line-height: 2rem;margin-bottom:15px;">Top subjects and skills</h2>
        <div class="row" style="max-width:1030px; margin:0 auto;">
            <ul class="list-inline top-subjects-list">
                <li><a href="{{ url('find-tutor?subject=Academic Writing') }}">Academic Writing</a></li>
                <li><a href="{{ url('find-tutor?subject=Accountancy') }}">Accountancy</a></li>
                <li><a href="{{ url('find-tutor?subject=Adobe Photoshop') }}">Adobe Photoshop</a></li>
                <li><a href="{{ url('find-tutor?subject=Algorithm And Data Structures') }}">Algorithm &amp; Data
                        Structures</a></li>
                <li><a href="{{ url('find-tutor?subject=Analog Electronics') }}">Analog Electronics</a></li>
                <li><a href="{{ url('find-tutor?subject=Art and Craft') }}">Art and Craft</a></li>
                <li><a href="{{ url('find-tutor?subject=AutoCAD') }}">AutoCAD</a></li>
                <li><a href="{{ url('find-tutor?subject=Basic Electronics') }}">Basic Electronics</a></li>
                <li><a href="{{ url('find-tutor?subject=BioChemistry') }}">BioChemistry</a></li>
                <li><a href="{{ url('find-tutor?subject=Biology') }}">Biology</a></li>
                <li><a href="{{ url('find-tutor?subject=Biotechnology') }}">Biotechnology</a></li>
                <li><a href="{{ url('find-tutor?subject=Business Management') }}">Business Management</a></li>
                <li><a href="{{ url('find-tutor?subject=C/C++') }}">C/C++</a></li>
                <li><a href="{{ url('find-tutor?subject=C#') }}">C#</a></li>
                <li><a href="{{ url('find-tutor?subject=Chemistry') }}">Chemistry</a></li>
                <li><a href="{{ url('find-tutor?subject=Civil Engineering') }}">Civil Engineering</a></li>
                <li><a href="{{ url('find-tutor?subject=Commerce') }}">Commerce</a></li>
                <li><a href="{{ url('find-tutor?subject=Communication Skills') }}">Communication Skills</a></li>
                <li><a href="{{ url('find-tutor?subject=Company Law') }}">Company Law</a></li>
                <li><a href="{{ url('find-tutor?subject=Computer networking') }}">Computer networking</a></li>
                <li><a href="{{ url('find-tutor?subject=Computer Science') }}">Computer Science</a></li>
                <li><a href="{{ url('find-tutor?subject=Control Systems') }}">Control Systems</a></li>
                <li><a href="{{ url('find-tutor?subject=DBMS') }}">DBMS</a></li>
                <li><a href="{{ url('find-tutor?subject=Digital Electronics') }}">Digital Electronics</a></li>
                <li><a href="{{ url('find-tutor?subject=.net') }}">.net</a></li>
                <li><a href="{{ url('find-tutor?subject=Economics') }}">Economics</a></li>
                <li><a href="{{ url('find-tutor?subject=Electrical Engineering') }}">Electrical Engineering</a></li>
                <li><a href="{{ url('find-tutor?subject=Engineering Mechanics') }}">Engineering Mechanics</a></li>
                <li><a href="{{ url('find-tutor?subject=English') }}">English</a></li>
                <li><a href="{{ url('find-tutor?subject=Environmental Science') }}">Environmental Science</a></li>
                <li><a href="{{ url('find-tutor?subject=Financial Management') }}">Financial Management</a></li>
                <li><a href="{{ url('find-tutor?subject=Fluid Mechanics') }}">Fluid Mechanics</a></li>
                <li><a href="{{ url('find-tutor?subject=French') }}">French</a></li>
                <li><a href="{{ url('find-tutor?subject=Geography') }}">Geography</a></li>
                <li><a href="{{ url('find-tutor?subject=German') }}">German</a></li>
                <li><a href="{{ url('find-tutor?subject=History') }}">History</a></li>
                <li><a href="{{ url('find-tutor?subject=HTML') }}">HTML</a></li>
                <li><a href="{{ url('find-tutor?subject=IELTS') }}">IELTS</a></li>
                <li><a href="{{ url('find-tutor?subject=Income Tax') }}">Income Tax</a></li>
                <li><a href="{{ url('find-tutor?subject=JAVA') }}">JAVA</a></li>
                <li><a href="{{ url('find-tutor?subject=Jquery and JavaScript') }}">Jquery and JavaScript</a></li>
                <li><a href="{{ url('find-tutor?subject=Law') }}">Law</a></li>
                <li><a href="{{ url('find-tutor?subject=Maths') }}">Maths</a></li>
                <li><a href="{{ url('find-tutor?subject=Mechanical') }}">Mechanical</a></li>
                <li><a href="{{ url('find-tutor?subject=Microbiology') }}">Microbiology</a></li>
                <li><a href="{{ url('find-tutor?subject=Music') }}">Music</a></li>
                <li><a href="{{ url('find-tutor?subject=PHP') }}">PHP</a></li>
                <li><a href="{{ url('find-tutor?subject=Physics') }}">Physics</a></li>
                <li><a href="{{ url('find-tutor?subject=Political Science') }}">Political Science</a></li>
                <li><a href="{{ url('find-tutor?subject=Programming') }}">Programming</a></li>
                <li><a href="{{ url('find-tutor?subject=Psychology') }}">Psychology</a></li>
                <li><a href="{{ url('find-tutor?subject=Python') }}">Python</a></li>
                <li><a href="{{ url('find-tutor?subject=R') }}">R</a></li>
                <li><a href="{{ url('find-tutor?subject=Science') }}">Science</a></li>
                <li><a href="{{ url('find-tutor?subject=Selenium Webdriver') }}">Selenium Webdriver</a></li>
                <li><a href="{{ url('find-tutor?subject=Sociology') }}">Sociology</a></li>
                <li><a href="{{ url('find-tutor?subject=Statistics') }}">Statistics</a></li>
                <li><a href="{{ url('find-tutor?subject=Strength of Materials') }}">Strength of Materials</a></li>
                <li><a href="{{ url('find-tutor?subject=Thermodynamics') }}">Thermodynamics</a></li>
                <li><a href="{{ url('find-tutor?subject=Zoology') }}">Zoology</a></li>
            </ul>
        </div>
    </div>
@stop


@push('include-js')
    {{-- <script src="{{ asset('asset/js/index.js') }}"></script> --}}
@endpush

@section('footer')
    @include('includes.footer')
@stop
