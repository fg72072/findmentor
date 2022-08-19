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
                            Student Request List</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active"> Student Request List</li>
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
                                    <li class="nav-item"><a class="nav-link active" id="top-home-tab"
                                            data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home"
                                            aria-selected="true"><i data-feather="target"></i>Active</a></li>
                                    <li class="nav-item"><a class="nav-link" id="profile-top-tab"
                                            data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile"
                                            aria-selected="false"><i data-feather="info"></i>Close</a></li>
                                    <input type="text" name="search" id="search" placeholder="Search" class="form-control"
                                        style="width: 200px !important;">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <div class="row">
                                @if (count($data) > 0)
                                    @foreach ($data as $item)
                                        @if ($item->is_closed == 0)
                                            <div class="col-xxl-12 col-lg-12 student" data-student="{{ $item->name }}">
                                                <div class="card">
                                                    <div class="job-search">
                                                        <div class="card-body">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <h6 class="f-w-600">
                                                                        <a href="#"> {{ $item->name }}</a>
                                                                    </h6>
                                                                    <p class="mb-0">{{ $item->location }}</p>
                                                                    <p class="mb-0">{{ $item->subject }}</p>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                {{ $item->detail }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            @if (count($data) > 0)
                                @foreach ($data as $item)
                                    @if ($item->is_closed == 1)
                                        <div class="col-xxl-12 col-lg-12 student" data-student="{{ $item->name }}">
                                            <div class="card">
                                                <div class="job-search">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <h6 class="f-w-600">
                                                                    <a href="#"> {{ $item->name }}</a>
                                                                </h6>
                                                                <p class="mb-0">{{ $item->location }}</p>
                                                                <p class="mb-0">{{ $item->subject }}</p>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            {{ $item->detail }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@stop

@push('include-js')
    <script>
        $(document).ready(function() {
            $("#search").keyup(function() {
                var search_keyword = this.value
                $(".student").each(function(index) {
                    $(this).hide();
                    if ($(this).attr('data-student').toLowerCase().indexOf(search_keyword
                            .toLowerCase()) > -1) {
                        $(this).show();
                    }
                });
            });
        })
    </script>
@endpush
@section('footer')
    @include('admin.includes.footer')
@stop
