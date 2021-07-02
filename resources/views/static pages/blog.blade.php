@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<!-- Home Page Styling -->
<link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/static-pages.css') }}">
<style>
    .blog_content div,
    .blog_content p,
    .blog_content div>p,
    .blog_content div>div,
    .blog_content h1,
    .blog_content h2,
    .blog_content h3,
    .blog_content h4,
    .blog_content h5,
    .blog_content h6,
    .blog_content li {
        font-size: 18px;
        list-style: none;
        display: inline;
    }

    .btn-u {
        border: 0;
        color: #fff !important;
        font-size: 14px;
        cursor: pointer;
        font-weight: 400;
        padding: 6px 13px;
        position: relative;
        background: #72c02c;
        white-space: nowrap;
        display: inline-block;
        text-decoration: none;
        outline: none;
    }

    .pagination .active,
    .pagination>.active>a,
    .btn-u,
    .btn-u:hover,
    .sky-form .button {
        border-color: #3498db;
        background-color: #3498db;
    }

    .btn-u {
        box-shadow: 0 2px 0 #006599;
    }

    .btn-u,
    .btn {
        font-size: 15px;
    }

</style>
<!-- Home Page Styling -->
@endpush

@section('content')
<div class="container content no-padding-top mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row" style="max-width:830px; margin:0 auto;">
                <div class="blog-page">
                    @if (Route::currentRouteName() == 'single.blog')
                    @if ($blog)
                    <div class="row blog blog-medium margin-bottom-40">
                        <h2 class="">
                            <a target="" href="javascrit:void(0)">
                                {{$blog->title}}
                            </a>
                        </h2>
                        <div>
                            <div class="">
                                {!! $blog->post !!}
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    @if (count($blogs)>0)
                    @foreach ($blogs as $key => $blog)
                    <!--Blog Post-->
                    <div class="row blog blog-medium margin-bottom-40">
                        <h2 class="">
                            <a href="{{route('single.blog',['title'=>\App\Common::cleanString($blog->title)])}}">
                                {{$blog->title}}
                            </a>
                        </h2>
                        <div>
                            <div class="blog_content">
                                {!! strlen($blog->post) > 566 ? substr($blog->post,0,566).'...' : $blog->post !!}
                            </div>
                            <p>
                                <button class="btn-u btn-u-small"
                                    onclick="location.href = '{{route('single.blog',['title'=>\App\Common::cleanString($blog->title)])}}';">
                                    <i class="fas fa-location-arrow"></i>
                                    Read More
                                </button>
                            </p>
                        </div>
                    </div>
                    <!--End Blog Post-->
                    @endforeach
                    @endif
                    @endif

                    <!--Pagination-->
                    @if (Route::currentRouteName() == 'blogs')
                    <div class="text-center ">
                        <div class="d-inline-block">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                    @endif
                    <!--End Pagination-->

                </div>
                <!-- End Right Sidebar -->
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
@include('includes.footer')
@stop
