@extends('admin.layouts.app')

@section('title')
Tutor | Admin
@stop



@section('header')
@include('admin.includes.header')
@stop

@section('left-bar')
@include('admin.includes.leftbar')
@stop

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>
                        User List</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row project-cards">
            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                        href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i
                                            data-feather="target"></i>Student</a></li>
                                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                        href="#top-profile" role="tab" aria-controls="top-profile"
                                        aria-selected="false"><i data-feather="info"></i>Teacher</a></li>
                                <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                        href="#top-contact" role="tab" aria-controls="top-contact"
                                        aria-selected="false"><i data-feather="check-circle"></i>Premium </a></li>
                                <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                        href="#top-block" role="tab" aria-controls="top-contact"
                                        aria-selected="false"><i data-feather="lock"></i>Blocked_Users </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                aria-labelledby="top-home-tab">
                                <div class="row">
                                    @if (count($students)>0)
                                    @foreach ($students as $student)
                                    <div class="col-xl-4 box-col-6">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <img class="img-fluid" src="../assets/images/user-card/3.jpg" alt="">
                                            </div>
                                            <div class="card-profile">
                                                @php
                                                $profile=$student->profile?$student->profile:'fall-back.png';
                                                @endphp
                                                <img class="rounded-circle" src="{{asset('asset/profile/'.$profile)}}"
                                                    alt="">
                                            </div>
                                            <div class="text-center profile-details">
                                                <a href="{{route('admin_request',['std_id'=>$student->id])}}">
                                                    <h4>{{$student->name}}</h4>
                                                </a>
                                                <a href="{{route('admin_user_reject',['id'=>$student->id])}}">
                                                    <span class="badge badge-primary">Account Block</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel"
                                aria-labelledby="profile-top-tab">
                                <div class="row">
                                    @if (count($teachers)>0)
                                    @foreach ($teachers as $teacher)
                                    <div class="col-xl-4 box-col-6">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <img class="img-fluid" src="../assets/images/user-card/3.jpg" alt="">
                                            </div>
                                            <div class="card-profile">
                                                @php
                                                $profile=$teacher->profile?$teacher->profile:'fall-back.png';
                                                @endphp
                                                <img class="rounded-circle" src="{{asset('asset/profile/'.$profile)}}"
                                                    alt="">
                                            </div>
                                            <div class="text-center profile-details">
                                                <a href="{{route('admin_user_detail',['id'=>$teacher->id])}}">
                                                    <h4>{{$teacher->name}}</h4>
                                                </a>
                                                <a href="{{route('admin_user_reject',['id'=>$teacher->id])}}">
                                                    <span class="badge badge-primary">Account Block</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                aria-labelledby="contact-top-tab">
                                <div class="row">
                                    @if (count($premiumTeachers)>0)
                                    @foreach ($premiumTeachers as $teacher)
                                    <div class="col-xl-4 box-col-6">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <img class="img-fluid" src="../assets/images/user-card/3.jpg" alt="">
                                            </div>
                                            <div class="card-profile">
                                                @php
                                                $profile=$teacher->profile?$teacher->profile:'fall-back.png';
                                                @endphp
                                                <img class="rounded-circle" src="{{asset('asset/profile/'.$profile)}}"
                                                    alt="">
                                            </div>
                                            <div class="text-center profile-details">
                                                <a href="{{route('admin_user_detail',['id'=>$teacher->id])}}">
                                                    <h4>{{$teacher->name}}</h4>
                                                </a>
                                                <a href="{{route('admin_user_reject',['id'=>$teacher->id])}}">
                                                    <span class="badge badge-primary">Account Block</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <h3>No Member Found!</h3>
                                    <br>
                                    <br>
                                    <br>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-block" role="tabpanel" aria-labelledby="profile-top-tab">
                                <div class="row">
                                    @if (count($blockedUsers)>0)
                                    @foreach ($blockedUsers as $blockedUser)
                                    <div class="col-xl-4 box-col-6">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <img class="img-fluid" src="../assets/images/user-card/3.jpg" alt="">
                                            </div>
                                            <div class="card-profile">
                                                @php
                                                $profile=$blockedUser->profile?$blockedUser->profile:'fall-back.png';
                                                @endphp
                                                <img class="rounded-circle" src="{{asset('asset/profile/'.$profile)}}"
                                                    alt="">
                                            </div>
                                            <div class="text-center profile-details">
                                                <h4>{{$blockedUser->name}}</h4>
                                                <a href="{{route('admin_user_activate',['id'=>$blockedUser->id])}}">
                                                    <span class="badge badge-primary">Account Re-Activate</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@stop


@section('footer')
@include('admin.includes.footer')
@stop
