@extends('admin.layouts.app')

@section('title')
    Tutor | Admin
@stop


@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                        <h3>Coins</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Coins</li>
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
                            <a class="add_more" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#add_edit_coins">
                                <h5>Add Coins <i class="align-middle" data-feather="plus-circle"></i></h5>
                            </a>

                        </div>
                        <div class="table-responsive container">
                            <table id="mytable" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Coins </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($countries) > 0)
                                        @foreach ($countries as $key => $country)
                                            @if ($country->status == '1')
                                                <tr>
                                                    <th class="text-center">{{ $country->id }}</th>
                                                    <td class="text-center">{{ $country->name }}</td>
                                                    <td class="text-center">{{ $country->coins }}</td>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="edit" href="javascript:void(0)"
                                                            data-bs-toggle="modal" data-bs-target="#add_edit_coins"
                                                            data-id='{{ $country->id }}'
                                                            data-coins='{{ $country->coins }}'><i style="color: green"
                                                                data-feather="edit"></i></a>
                                                        <a href="{{ url('admin/coins-setting-delete', $country->id) }}"
                                                            onclick="return confirm('Are you sure?')"><i style="color: red"
                                                                data-feather="trash-2"></i></a>
                                                    </td>
                                                </tr>

                                            @endif
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
    <div class="modal fade" id="add_edit_coins" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Coins</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <form action="{{ route('add_coin_deduction') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label" for="country">Country</label>
                            <select class=" mb-3 select-country" name="country" id="country">
                                <option value="0">Default</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <input class="form-control mt-3" type="number" value="" name="no_of_coins">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.edit').click(function() {
                id = $(this).attr('data-id');
                coins = $(this).attr('data-coins');
                $('input[name=no_of_coins]').val(coins)
                $("#country").val(id).change();
            });
            $('.add_more').click(function() {
                $('input[name=id]').val('')
                $('select[name=country]').val('0').change();
                $('input[name=no_of_coins]').val('')
            });



        });
        $(document).ready(function() {
            $('#mytable').DataTable();
            $(".select-country").select2({
                dropdownParent: $("#add_edit_coins")
            });
        });
    </script>
@endpush
