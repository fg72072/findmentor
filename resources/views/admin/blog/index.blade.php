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
            font-size: 100%;
            list-style: none;
            display: inline;
            font-weight: 100;
        }

    </style>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Blogs</h3>
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
                            <a class="add_more" href="{{ route('admin.blog.create') }}">
                                <h5>Add Blog <i class="align-middle" data-feather="plus-circle"></i></h5>
                            </a>
                        </div>
                        <div class="table-responsive container">
                            <table id="mytable" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($blogs) > 0)
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $blog->title }}</td>
                                                <td class="blog_content">{!! strlen($blog->post) > 50 ? substr($blog->post, 0, 50) . '..' : $blog->post !!}
                                                </td>
                                                <td>{{ $blog->created_at }}</td>
                                                <td>
                                                    <a class="edit"
                                                        href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}">
                                                        <i style="color: green" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.blog.delete', ['id' => $blog->id]) }}"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i style="color: red" data-feather="trash-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
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
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
            $('.edit').click(function() {
                coin_id = $(this).attr('data-id');
                coins = $(this).attr('data-coins');

                $('input[name=coin_id]').val(coin_id)
                $('input[name=no_of_coins]').val(coins)
            });

            $('.add_more').click(function() {
                $('input[name=coin_id]').val('')
                $('input[name=no_of_coins]').val('')
            });



        });
    </script>
@endpush
