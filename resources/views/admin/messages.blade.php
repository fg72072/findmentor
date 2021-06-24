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
                    <h3>Messages</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row project-cards">
            <div class="col-sm-12">
                <div class="row">
                    <div class="card-body p-0">
                        <div class="row chat-box">
                            <!-- Chat right side start-->
                            <div class="col pe-0 chat-right-aside">
                                <!-- chat start-->
                                <div class="chat">
                                    <div class="chat-history chat-msg-box custom-scrollbar">
                                        <ul>
                                            @if (count($messages)>0)
                                            @foreach ($messages as $item)
                                            @if ($item->user_id != $user_id)
                                            <li class="clearfix">
                                                <div class="message other-message pull-right">
                                                    <img class="rounded-circle float-end chat-user-img img-30"
                                                        src="{{asset('asset/profile/')}}/{{\App\User::where('id',$item->user_id)->first()->profile}}"
                                                        alt="" />
                                                    <div class="message-data">
                                                        <span class="message-data-time">
                                                            {{\App\Common::changeDate($item->created_at)}}
                                                        </span>
                                                    </div>
                                                    {{$item->body}}
                                                </div>
                                            </li>
                                            @else
                                            <li>
                                                <div class="message my-message">
                                                    <img class="rounded-circle float-start chat-user-img img-30"
                                                        src="{{asset('asset/profile/')}}/{{\App\User::where('id',$item->user_id)->first()->profile}}"
                                                        alt="" />
                                                    <div class="message-data text-end">
                                                        <span class="message-data-time">
                                                            {{ \App\Common::changeDate($item->created_at)}}
                                                        </span>
                                                    </div>
                                                    {{$item->body }}
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                    <!-- chat end-->
                                    <!-- Chat right side ends-->
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
