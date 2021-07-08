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
                            <h5>Add More Coins <i class="align-middle" data-feather="plus-circle"></i></h5>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-xl">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Coins </th>
                                    <th class="text-center">Price $</th>
                                    <th class="text-center">discount %</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($coins)>0)
                                @foreach ($coins as $key => $coin)
                                <tr>
                                    <th class="text-center">{{$key+1}}</th>
                                    <td class="text-center">{{$coin->no_of_coin}}</td>
                                    <td class="text-center">{{$coin->price}}</td>
                                    <td class="text-center">{{$coin->discount?$coin->discount:'-'}}</td>
                                    <td class="text-center">
                                        <a class="edit" href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#add_edit_coins" data-id='{{$coin->id}}'
                                            data-discount='{{$coin->discount}}' data-price='{{$coin->price}}'
                                            data-coins='{{$coin->no_of_coin}}'><i style="color: green"
                                                data-feather="edit"></i></a>
                                        <a href="{{route('admin_delete_coins',['id'=>$coin->id])}}"
                                            onclick="return confirm('Are you sure?')"><i style="color: red"
                                                data-feather="trash-2"></i></a>
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
<div class="modal fade" id="add_edit_coins" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Coins</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                    data-bs-original-title="" title=""></button>
            </div>
            <form action="{{route('admin_add_edit_coins')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">No Of Coins</label>
                        <input class="form-control mb-3" type="number" value="" name="no_of_coins">
                        <label class="col-form-label" for="recipient-name">Discount</label>
                        <input class="form-control" type="number" value="" name="discount" min='0' max="100">
                        <label class="col-form-label" for="recipient-name">Price</label>
                        <input class="form-control" type="number" value="" name="price" min='1'>
                        <input type="hidden" name='coin_id' value="">
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
    $(document).ready(function () {
        $('.edit').click(function(){
            coin_id = $(this).attr('data-id');
            coins = $(this).attr('data-coins');
            discount = $(this).attr('data-discount');
            price = $(this).attr('data-price');

            $('input[name=coin_id]').val(coin_id)
            $('input[name=no_of_coins]').val(coins)
            $('input[name=discount]').val(discount)
            $('input[name=price]').val(price)
        });

        $('.add_more').click(function(){
            $('input[name=coin_id]').val('')
            $('input[name=no_of_coins]').val('')
            $('input[name=discount]').val('')
            $('input[name=price]').val('')
        });



    });


</script>
@endpush
