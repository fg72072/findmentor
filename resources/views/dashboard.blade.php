@extends('layouts.app')

@section('title')
Tutor | Dashboard
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/Dashboard.css') }}">
@endpush

@section('content')
<section class="servicesSection py-2">
    <div class="container">
        <div class="serviceHeading">
            <div class="container">
                <p class="text-center text-capitalize  DashSubHead">Our Dashboard</p>
                <hr class=" line w-25 mx-auto">
            </div>
        </div>
        <div class="services pt-4">
            <div class="row">
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="{{route('profile')}}" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield far fa-images"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">Upload Photo</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="
                    @role('teacher')
                    {{route('tutor_profile',['id'=>Auth::user()->id])}}
                    @endrole
                    @role('student')
                    {{route('setting')}}
                    @endrole
                    " style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield far fa-eye"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">My Profile</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="{{route('review')}}" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield fas fa-thumbs-up"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">Get Reviews</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="{{route('buyCoin')}}" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield fas fa-coins"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">@if ($coins) {{$coins->coins}} @else 0 @endif
                                    Coins</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="{{route('refer_and_earn')}}" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield fas fa-wallet"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">Refer and Earn</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="javascript:void(0)" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield fas fa-bullhorn"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">Promote Yourself</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="javascript:void(0)" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class="shield fas fa-user-plus"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">Invite Friends</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="Serv1 col-lg-3 col-md-6 col-12 mb-4">
                    <a href="{{route('phone')}}" style="text-decoration: none;">
                        <div class="card ServCard flex">
                            <div class="Servicondiv flex mt-2">
                                <i class=" shield fas fa-phone"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center Servtext">Mobile Verified</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <p class="ServFooter text-center pt-5">Need a support ? Get Started Now</p>
        </div>
    </div>
    </div>
</section>
@stop
