@extends('layouts.app')

@section('title')
Tutor | Refer & Earn
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/Refer&Earn.css') }}" class="color-switcher-link">
@endpush

@section('content')
<section class="servicesSection py-2 mt-5">
    <div class="container">
        <div class="serviceHeading">
            <div class="container">
                <h1 class="display-4 pl-5 pr-5 text-center ReferHead">Refer & Earn</h1>
                <hr class=" line w-25 mx-auto">
                <p class="text-center text-capitalize  ReferSubHead">When you refer someone and they buy coins, you get
                    10% of the coins they buy
                </p>
            </div>
        </div>
        <div class="services pt-4">
            <div class="row">
                <div class="Serv1 col-lg-7 col-md-7 col-12 mb-4">
                    <div class="card ServCard pl-3 py-3">
                        <h5 style="font-weight:bold" class=" text-capitalize  ReferSubHead">Your Profile page refferal
                            link (recommend)</h5>
                        <input readonly value="{{url('/')}}/refer/{{$refernce_id}}?r={{$refernce_id}}" id="inputText"
                            type="text"
                            style="padding-left:1rem; width: 90%; height: 35px; border: 1px solid gray; border-radius: 5px;">
                        <button id="copyText" style="width: 30%;" type="button" class="btn btn-unique  mt-2"><i
                                class="far fa-copy pr-2"></i>Copy Link</button>

                        <p class=" pr-3 pt-3">Whenever you want to share your profile, use this link. You will get
                            people to your profile and, if they join, referral coins for life as well. It works
                            fabulously in email footers and social media.</p>
                    </div>
                    <div class="card ServCard pl-3 py-3 mt-3">
                        <h5 style="font-weight:bold" class=" text-capitalize  ReferSubHead">Referral link without
                            profile page</h5>
                        <input readonly id="inputText1" value="{{url('/')}}/refer/{{$refernce_id}}?r" type="text"
                            style="padding-left:1rem; width: 90%; height: 35px; border: 1px solid gray; border-radius: 5px;">
                        <button id="copyText1" style="width: 30%;" type="button" class="btn btn-unique  mt-2"><i
                                class="far fa-copy pr-2"></i>Copy Link</button>
                        <p class=" pr-3 pt-3">This is if you want to remain anonymous while earning referral bonus.</p>
                    </div>
                </div>
                <div class="Serv1 col-lg-5 col-md-5 col-12 mb-4">
                    <div class="card ServCard pl-3 py-3">
                        <h5 style="font-weight:bold" class=" text-capitalize  ReferSubHead">Referral Coins for Countries
                        </h5>
                        <p class=" pr-3 pt-3">This is if you want to remain anonymous while earning referral bonus.</p>

                        <input placeholder="Search.." type="text"
                            style="padding-left:1rem; width: 90%; height: 35px; border: 1px solid gray; border-radius: 5px;">
                        <table id="dtBasicExample" class="mt-3 table table-striped table-bordered table-sm"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Country
                                    </th>
                                    <th class="th-sm">Coins
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="List">
                                <tr>
                                    <td class="Countryname">Pakistan</td>
                                    <td class="Countrycoin">3</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cont-icons cont contIcon pt-5">
                            <i class="fas fa-chevron-left back"></i>
                            <h4 style="display: inline;">10</h4>
                            <i class="fas fa-chevron-right next"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@push('include-js')
<script src="{{ asset('asset/js/Refer&Earn.js') }}"></script>
@endpush
