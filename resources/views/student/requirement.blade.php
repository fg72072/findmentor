@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/MyRequirement.css') }}">
@endpush

@section('content')
<section class="requirement">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="whoiam pt-5">
                    <div class=" row HeadBtn justify-content-between">
                        <h1 class="display-4 Req" style="display: inline;">My Requirements.</h1>
                        <button onclick="window.location.href='{{ route('student.request') }}'" type="button"
                            class="btn btn-outline-primary btn-lg">Post Your Study Needs</button>
                    </div>
                    <hr class="w-25">
                </div>
            </div>
        </div>

        @if(count($data)>0)
        @foreach($data as $key => $post)
        <div class="col-lg-12 col-md-12 col-12">
            <div class="whoiam pt-5">
                <a href="{{route('show_tutor_job',['id'=>$post->id])}}">
                    <h3 class="TeacherHead pt-5">{{$post->subject}} tutor needed in {{$post->location}}.</h3>
                </a>
                <p class="TeacherPara pt-2">{{$post->detail}}</p>
                <div class="pt-5">
                    <div class="locationdiv">
                        <i class="fas fa-map-marker-alt loc pr-3"></i>
                        <p class="Location pt-2">{{$post->location}}</p>
                    </div>
                    <div class="amountdiv pt-2">
                        <i class="fa fa-usd icons dollar pr-3"></i>
                        <p class="Location pt-2">{{$post->budget}} Per Month</p>
                    </div>
                    <div class="BottomIconsdiv pt-5">
                        <i class="far fa-envelope dollar pr-3 "></i>
                        <p class="Location pt-2">View Message</p>
                        <i class="fas fa-times dollar pr-3 pl-5"></i>
                        <a href="{{ route('request.closed',['id'=>$post->id]) }}" class="Location pt-2"
                            @if($post->is_closed == 1)
                            style="pointer-events: none"
                            @endif>
                            Post Closed
                        </a>
                        <i class="fas fa-redo-alt dollar pr-3 pl-5"></i>
                        <a href="{{ route('request.repost',['id'=>$post->id]) }}" class="Location pt-2"
                            @if($post->is_closed == 0)
                            style="pointer-events: none"
                            @endif>
                            Repost
                        </a>
                    </div>
                    <hr class="w-25">
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>
@stop
