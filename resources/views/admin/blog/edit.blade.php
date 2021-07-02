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
                    <h3>Edit Blog</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success btn-sm create_blog">Update</button>
                        </div>
                    </div>
                    <div class="container pt-3 pb-5">
                        <form id="blog_form" method="post" action="{{route('admin.blog.update',['id'=>$blog->id])}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$blog->title}}" />
                            </div>
                            <div class="form-group mt-4">
                                <label><strong>Description</strong></label>
                                <textarea id="ckeditor" class="ckeditor form-control" name="post">{!!$blog->post!!}</textarea>
                            </div>
                        </form>
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


@push('include-js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.create_blog').on('click',function(){
            $('#blog_form').submit();
        })

    CKEDITOR.replace( 'ckeditor', {
        // filebrowserUploadUrl: "{{route('admin.blog.store', ['_token' => csrf_token() ])}}",
        // filebrowserUploadMethod: 'form',
    });

    });
</script>

@endpush
