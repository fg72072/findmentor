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
                    <h3>Setting</h3>
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
                                            data-feather="target"></i>UserName</a></li>
                                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                        href="#top-profile" role="tab" aria-controls="top-profile"
                                        aria-selected="false"><i data-feather="info"></i>Password</a></li>
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
                                    <div class="col-xl-12 box-col-12">

                                        <h4>Change Username</h4>
                                    </div>
                                    <br>
                                    <form method="POST" action="{{ route('admin_change_username') }}">
                                        @csrf

                                        <div class="form-group row mb-2">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">Username</label>

                                            <div class="col-md-6">
                                                <input id="password" type="text" class="form-control" name="username">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Username
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel"
                                aria-labelledby="profile-top-tab">
                                <div class="row">
                                    <div class="col-xl-12 box-col-12">

                                        <h4>Change Password</h4>
                                    </div>
                                    <br>
                                    <form method="POST" action="{{ route('admin_change_password') }}">
                                        @csrf

                                        @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                        @endforeach

                                        <div class="form-group row mb-2">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Current
                                                Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control"
                                                    name="current_password" autocomplete="current-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-2">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New
                                                Password</label>

                                            <div class="col-md-6">
                                                <input id="new_password" type="password" class="form-control"
                                                    name="new_password" autocomplete="current-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-2">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New
                                                Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="new_confirm_password" type="password" class="form-control"
                                                    name="new_confirm_password" autocomplete="current-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
@stop


@section('footer')
@include('admin.includes.footer')
@stop
