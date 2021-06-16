@extends('admin.layouts.app')

@section('title')
Tutor | Verify User
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
                    <h3>Teacher Account Detail</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Account Verify</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="header-faq">
                    {{-- <h5 class="mb-0">Browse articles by category</h5> --}}
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{$data->name}}</h5>
                                        <p class="mb-0">{{$data->email}}</p>
                                    </div>
                                    <div class="col-md-6" style="text-align: right">
                                        <a href="{{route('admin_user_approve',['id'=>$data->id])}}"><button
                                                class="btn btn-success">Approve</button></a>
                                        <a href="{{route('admin_user_reject',['id'=>$data->id])}}"><button
                                                class="btn btn-danger">Reject</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row browse">
                                    <div class="col-xl-4 xl-50 col-md-6">
                                        <div class="browse-articles">
                                            <h6><span><i data-feather="archive"></i></span>Subjects</h6>
                                            <ul>
                                                @if (count($data['subject'])>0)
                                                @foreach ($data['subject'] as $subject)
                                                <li><span><i data-feather="file-text"></i></span>
                                                    <span>{{ucfirst($subject->subject)}}
                                                        ({{ucfirst($subject->level_to)}})
                                                    </span>
                                                </li>
                                                @endforeach
                                                @else
                                                <h6>No Subject mention.</h6>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 xl-50 col-md-6">
                                        <div class="browse-articles">
                                            <h6><span><i data-feather="archive"></i></span> Education</h6>
                                            <ul>
                                                @if (count($data['education'])>0)
                                                @foreach ($data['education'] as $education)
                                                <li>
                                                    <span>
                                                        <i data-feather="file-text"></i>
                                                    </span>
                                                    <span>
                                                        {{ucfirst($education->degree_name)}}
                                                    </span>
                                                    <p> ({{$education->start_month}},
                                                        {{$education->start_year}}-{{$education->end_month}},
                                                        {{$education->end_year}}) from {{$education->institute_name}}
                                                    </p>
                                                </li>
                                                @endforeach
                                                @else
                                                <h6>No Education mention.</h6>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 xl-50 col-md-6">
                                        <div class="browse-articles">
                                            <h6><span><i data-feather="archive"></i></span>Experience
                                            </h6>
                                            <ul>
                                                @if (count($data['experience'])>0)
                                                @foreach ($data['experience'] as $experience)
                                                <li>
                                                    <span>
                                                        <i data-feather="file-text"></i>
                                                    </span>
                                                    <span>
                                                        {{ucfirst($experience->designation)}}</span>
                                                    <p> ({{$experience->start_month}},
                                                        {{$experience->start_year}}-{{$experience->end_month}},
                                                        {{$experience->end_year}}) from
                                                        {{$experience->organization_name}}
                                                    </p>
                                                </li>
                                                @endforeach
                                                @else
                                                <h6>No Experience mention.</h6>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 xl-50 col-md-6">
                                        <div class="browse-articles browse-bottom">
                                            <h6><span><i data-feather="archive"></i> Fee details</span></h6>
                                            <ul>
                                                @if (!empty($data['info']))
                                                <li>

                                                    <p><span>₹</span>
                                                        {{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}}
                                                        (US${{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}})
                                                    </p>
                                                </li>
                                                @else
                                                <h6>No Data mentioned.</h6>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 xl-100">
                                        <div class="browse-articles browse-bottom">
                                            <h6><span><i data-feather="archive"></i></span>Other</h6>
                                            <ul>
                                                @if (!empty($data['info']))
                                                <li>
                                                    <span class="sidepanel">
                                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                                        <b>Location:</b> {{$data['info']->location}} </span>
                                                </li>
                                                <li>
                                                    <span class="sidepanel">
                                                        <b>Can travel:</b> {{$data['info']->travel_to_student}}</span>
                                                </li>

                                                <li>
                                                    <span class="sidepanel">
                                                        <b>Last login:</b>
                                                        {{\App\Common::changeDate($data->last_login_at)}}</span>
                                                </li>

                                                <li>
                                                    <span class="idepanel">
                                                        <b>Total Teaching exp:</b> {{$data['info']->total_experience}}
                                                        yrs.</span>
                                                </li>
                                                <li><span class="sidepanel">
                                                        <b>Teaches online:</b>
                                                        {{$data['info']->online_available}}</span></li>
                                                <li><span class="sidepanel">
                                                        <b>Online Teaching exp:</b>
                                                        {{$data['info']->total_experience_online}}
                                                        yrs.</span></li>

                                                <li><span class="sidepanel">
                                                        <b>Teaches at student's home:</b>
                                                        {{$data['info']->travel_to_student}}</span></li>
                                                <li><span class="sidepanel">
                                                        <b>Homework Help:</b> {{$data['info']->help_with}}</li>
                                                <li><span class="sidepanel">
                                                        <b>Fee:</b>
                                                        Rs{{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}}
                                                        (USD
                                                        {{$data['info']->min_fee}}–{{$data['info']->max_fee}}/{{$data['info']->fee_charge}})</span>
                                                </li>
                                                @else
                                                <h6>No Data mentioned.</h6>
                                                @endif
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
    </div>
    <!-- Container-fluid Ends-->
</div>

@stop


@section('footer')
@include('admin.includes.footer')
@stop
