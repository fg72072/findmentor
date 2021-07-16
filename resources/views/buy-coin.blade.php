@extends('layouts.app')

@section('title')
Tutor | Buy Coin
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/CoinSection.css') }}">
@endpush

@section('content')
{{-- <div class="all_content"> --}}
<section>
    <div class="container pt-5 mt-5">
        {{-- <p class="text-center text-capitalize pt-5 CoinSubHead">Our Services</p>
        <hr class="w-25 mx-auto"> --}}
        <h1 class="display-1 pl-5 pr-5 text-center CoinHead">Coin Wallet</h1>
        <h1 class="display-1 pl-5 pr-5 text-center CoinHead">{{$my_coins}}</h1>
        <div style="text-align: center;">
            <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary  mt-5 FindBtn">Buy
                Coins</button>
        </div>
    </div>
</section>
<section>
    <div class="container pt-5">
        {{-- <input class="mr-5" type="text" id="searchInput" placeholder="Search.."> --}}
        {{-- <div style="float: right;">
            <p class="Rec">Records Per Page</p>
            <select name="cars" id="Grades" class="level selLev">
                <option value="" disabled selected>10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
            </select>
        </div> --}}
    </div>
</section>
<section>
    <div class="container pt-5">
        <div class="content">
            <div class="columns-head">
                <div class="date contentHeading flex">
                    <p>Date</p>
                </div>
                <div class="credit contentHeading flex">
                    <p>Description</p>
                </div>
                <div class="debit contentHeading flex">
                    <p>Coin</p>
                </div>
            </div>
            <div class="columns-content">
                @if (count($wallet_log)>0)
                @foreach ($wallet_log as $log)
                @if ($log->coin_used_id > 0)
                <div class="content1 outercontent">
                    <div class="cont-date cont flex">
                        <p>{{date('M d, Y', strtotime($log->created_at))}}</p>
                    </div>
                    <div class="cont-desdes cont flex">
                        <p>{{$log->description}} {{$log->name}} requirement <a
                                href="{{route('show_tutor_job',['id'=>$log->requirement_id])}}"> I Need
                                {{$log->subject}} teacher in
                                {{$log->location}}</a> </p>
                    </div>
                    <div class="cont-credit cont flex">
                        <p>{{$log->coin}}</p>
                    </div>
                </div>
                @else
                <div class="content1 outercontent">
                    <div class="cont-date cont flex">
                        <p>{{date('M d, Y', strtotime($log->created_at))}}</p>
                    </div>
                    <div class="cont-desdes cont flex">
                        <p>{{$log->description}}</p>
                    </div>
                    <div class="cont-credit cont flex">
                        <p>{{$log->coin}}</p>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="content1 outercontent">
                    <div class="cont-date cont flex">
                        <p>No Record </p>
                    </div>
                </div>
                @endif
            </div>
            {{-- <div class="cont-icons cont contIcon pt-5">
                <i class="fas fa-chevron-left"></i>
                <h3 style="display: inline;">10</h3>
                <i class="fas fa-chevron-right"></i>
            </div> --}}
        </div>
    </div>

</section>
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <i class="fas fa-arrow-left back" style="float: left;"></i>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="{{route('billing')}}" method="post">
                    <div class="modal-body flex">
                        <h1>Coins you want ?</h1>
                        @csrf
                        <select name="coin_id" id="Coins" name='coin_id' class="level sel mt-4"
                            onchange="getSelectValue();">
                            <option value="" disabled selected>Select</option>
                            @foreach ($coins as $coin)
                            <option value="{{$coin->id}}" data-save="{{$coin->discount?$coin->discount:0}}"
                                data-coin="{{$coin->no_of_coin}}" data-price="{{$coin->price}}">
                                {{$coin->no_of_coin}} @if ($coin->discount) (Save {{$coin->discount}}%) @endif
                            </option>
                            @endforeach
                        </select>

                        <div class="currency  mt-5 mb-0 flex" style="width: 100%;justify-content: space-evenly;">
                            <p id="Pkr" style="text-decoration:line-through; opacity: .7;font-size: 14px;">0 PKR<br>
                            </p>
                            <p id="Usd" style="text-decoration:line-through; opacity: .7;font-size: 14px;">0 USD<br>
                            </p>
                        </div>
                        <div class="currency flex">
                            <button type="button" id="Pkr_save" class="btn btn-outline-primary btn-lg ">Pkr :
                                0</button>
                            <button type="button" id="Usd_save" class="btn btn-primary btn-lg">Usd : 0</button>
                        </div>

                        <div class="currencyBtn  mt-5 flex">
                            <button type="submit" class="btn btn-primary btn-lg get">Get Coins</button>
                        </div>

                        <div class="modalIcons flex pt-5">
                            <a href="https://www.paypal.com/pk/home">
                                <i class="fab fa-paypal pr-5 "></i>
                            </a>
                            <a href="https://stripe.com/en-gb-us">
                                <i class="fab fa-stripe pr-5"></i>

                            </a>
                            <a href="https://www.paypal.com/pk/home">
                                <i class="fab fa-cc-paypal pr-5"></i>
                            </a>
                            <a href="https://mea.mastercard.com/en-region-mea.html">
                                <i class="fab fa-cc-mastercard pr-5"></i>
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
{{-- </div> --}}
@stop


@push('include-js')
<script src="{{ asset('asset/js/index.js') }}"></script>
@endpush
