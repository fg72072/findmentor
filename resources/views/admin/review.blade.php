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
                        User Reviews</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active"> User Reviews</li>
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
                    @if (count($data)>0)
                    @foreach ($data as $review)
                    <div class="col-xxl-12 col-lg-12">
                        <div class="card">
                            <div class="job-search">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="f-w-600">
                                                {{$review->name}}
                                            </h6>
                                            <p class="mb-0 pull-right">Rate: {{$review->rating}}</p>
                                            <p class="mb-0"><b>{{$review->headline}}</b></p>
                                            {{-- <p class="mb-0">{{$review->review}}</p> --}}
                                        </div>
                                    </div>
                                    <a href="{{route('admin.user.review.trash',['id'=>$review->review_id])}}"
                                        onclick="return confirm('Are you sure you want to delete it?\nBecause This action cannot be undone')">
                                        <p class="mb-0 pull-right" style="color: red">
                                            <i data-feather="trash-2"></i>
                                        </p>
                                    </a>
                                    <p style="max-width: 90%;text-align:justify">{{$review->review}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-xxl-12 col-lg-12">
                        <div class="card">
                            <div class="job-search">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="f-w-600">
                                                No Reviews
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('footer')
@include('admin.includes.footer')
@stop
