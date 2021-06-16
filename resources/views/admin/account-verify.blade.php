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
                    {{-- <h3>Knowledgebase</h3> --}}
                    <h3>Users Account Verification</h3>
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
            @if (count($data)>0)
            @foreach ($data as $user)
            <div class="col-xl-4 xl-100">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="media faq-widgets">
                            <div class="media-body">
                                <h5>{{$user->name}}</h5>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus.</p> --}}
                                <div>
                                    <a href="{{route('admin_user_detail',['id'=>$user->id])}}"><button
                                            class="btn btn-info">Review
                                            Detail</button></a>
                                    <a href="{{route('admin_user_approve',['id'=>$user->id])}}"><button
                                            class="btn btn-success">Approve</button></a>
                                    <a href="{{route('admin_user_reject',['id'=>$user->id])}}"><button
                                            class="btn btn-danger">Reject</button></a>
                                </div>
                            </div>
                            <img src="../asset/profile/{{$user->profile ? $user->profile : 'fall-back.png' }}"
                                style="max-width: 10%;">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-xl-4 xl-100">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="media faq-widgets">
                            <div class="media-body">
                                <h5>User Not Registered For Approval</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@stop


@section('footer')
@include('admin.includes.footer')
@stop
