@extends('layouts.app')

@section('title')
Tutor | Messages
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/AllMessages.css') }}">
@endpush

@section('content')
<section>
    <div class="FrontPage">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="frontPageContent">
                            <h1 class="display-4">
                                All Messages
                            </h1>
                            <a href="">
                                <button type="button" style="background: #4765a0 !important; border: #4765a0;"
                                    class="btn btn-primary btn-lg mt-2">View Unread Message</button>
                            </a>
                            <hr class=" line w-25 mx-1">
                            <div class="skillbutton">
                                <input class="InputTab mt-2 flex pl-2" id="BorderBott"
                                    placeholder="Select Requirement to filter Message">
                            </div>
                            <a href="">
                                <button type="button" style="background: #4765a0 !important; border: #4765a0;"
                                    class="btn btn-primary btn-lg mt-3">Search</button>
                            </a>
                            @if (count($data)>0)
                            @foreach ($data as $item)
                            @if ($item->user_id != $user_id)
                            <h2 class=" pt-3">
                                {{$item->username}}
                                <span
                                    class="pl-5">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->created_at)->diffForHumans()}}</span>
                            </h2>
                            <p class="pt-3">
                                Hi, Dear student how can i help you ?
                            </p>
                            <div class="top-icons" style="line-height: 50px;">
                                <span class="fa fa-comment message pl-4 pr-4"><a
                                        href="{{route('view_messages',['mThread'=>$item->thread_id])}}">Read &
                                        Reply</a></span>
                                @role('student')
                                <span class="fas fa-user phone pl-4 pr-4"><a
                                        href="{{route('tutor_profile',['id'=>$item->user_id])}}">View
                                        Profile</a></span>
                                @endrole

                                <span class="fas fa-suitcase pay pl-4 pr-4"><a
                                        href="{{route('show_tutor_job',['id'=>$item->post_id])}}"> View Post </a></span>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
