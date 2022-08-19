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
                        <h3>Payment Setting</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Payment Setting</li>
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
                        </div>
                        <div class="table-responsive container">
                            <table id="mytable" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Key </th>
                                        <th class="text-center">Type </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center">{{ $payment_gateway->id }}</th>
                                        <td class="text-center">{{ $payment_gateway->name }}</td>
                                        <td class="text-center">{{ $payment_gateway->paypal_key }}</td>
                                        <td class="text-center">{{ $payment_gateway->type }}</td>
                                        </td>
                                        <td class="text-center">
                                            <a class="edit" href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#add_edit_coins" data-id='{{ $payment_gateway->id }}'
                                                data-coins='{{ $payment_gateway->type }}'><i style="color: green"
                                                    data-feather="edit"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <div class="modal fade" id="add_edit_coins" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Setting</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <form action="{{ route('payment_setting') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control mt-3 mb-3" name="type" id="">
                                @if ($payment_gateway->type == 'sandbox')
                                    <option value="sandbox">Sandbox</option>
                                    <option value="production">Live(Production)</option>
                                @elseif ($payment_gateway->type == 'production')
                                    <option value="production">Live(Production)</option>
                                    <option value="sandbox">Sandbox</option>
                                @endif
                            </select>
                            <div class="form-group">
                                {{-- <label for="">Key</label> --}}
                                <input class="form-control" type="text" value="{{ $payment_gateway->paypal_key }}"
                                    name="key">
                            </div>
                            <input type="hidden" name="id" value="{{ $payment_gateway->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title=""
                            title="">Close</button>
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('footer')
    @include('admin.includes.footer')
@stop


@push('include-js')

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();

        });
    </script>
@endpush
