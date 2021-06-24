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
                    <h3>Chat List</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Chat List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row project-cards">
            <div class="col-sm-12">
                @if (count($data)>0)
                @foreach ($data as $item)
                <div class="col-xxl-12 col-lg-12">
                    <div class="card">
                        <div class="job-search">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="f-w-600">
                                            <a href="{{route('admin_request',['req_id'=>$item->post_id])}}">{{$item->subject}}
                                                teacher needed in {{$item->location}}</a>
                                        </h6>
                                        <p class="mb-0"><b>{{$item->username}}</b></p>
                                        <a href='{{route('admin.user.messages',['mThread'=>$item->thread_id,'user_id'=>$item->user_id])}}'
                                            class="btn btn-primary active pull-right" title="Messges">
                                            View Messages</a>
                                        <p class="mb-2">{{$item->last_message}}</p>
                                        <p class="mb-0">{{\App\Common::changeDate($item->created_at)}}</p>
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
    <!-- Container-fluid Ends-->
</div>
@stop


@section('footer')
@include('admin.includes.footer')
@stop
