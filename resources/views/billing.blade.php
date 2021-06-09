@extends('layouts.app')

@section('title')
Tutor | Buy Coin
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/BillingAddress.css') }}">
@endpush

@section('content')

<section>
    <div class="container">
        <p class="text-center text-capitalize pt-5 CoinSubHead">Should match with the name & address of the payment
            method</p>
        <hr class="w-25 mx-auto">
        <h1 class="display-2 pl-5 pr-5 text-center CoinHead">Billing Address</h1>
    </div>
</section>

<section>
    <div class="container">
        <form id="regForm" class="billingForm" method="post" action="{{route('buy_coin.payment')}}">
            @csrf
            <div class="progress ProgressBar">
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="PositionInfo pt-4">
                    <h1 class="Info">PERSONAL INFORMATION</h1>
                </div>

                <div class="form pt-5">
                    <h4 class="Info">First Name</h4>
                    <input class="InpTab" placeholder="Enter First Name" name="first_name">
                    <h4 class="Info">Last Name</h4>
                    <input class="InpTab" placeholder="Enter Last Name" name="last_name">
                    <h4 class="Info">Contact</h4>
                    <input class="InpTab" placeholder="Enter Contact Number" name="phone">

                    <h4 class="Info">Address</h4>
                    <input class="InpTab" placeholder="Enter Address" name="address">
                </div>
            </div>

            <div class="tab">
                <div class="PositionInfo pt-4">
                    <h1 class="Info">PERSONAL INFORMATION</h1>
                </div>
                <div class="form pt-5">
                    <h4 class="Info">Country</h4>
                    <input class="InpTab" placeholder="Enter Country" name="country">

                    <h4 class="Info">State</h4>
                    <input class="InpTab" placeholder="Enter State" name="state">

                    <h4 class="Info">City</h4>
                    <input class="InpTab" placeholder="Enter City" name="city">

                    <h4 class="Info">Postal Code</h4>
                    <input class="InpTab" placeholder="Enter Postal Code" name="postal_code">
                </div>
            </div>
            <div style="overflow:auto;">
                <div class="py-3" style="float:right;">
                    <button type="button" id="prevBtn" class="btn btn-successback" onclick="nextPrev(-1)">Back</button>
                    <button type="button" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)">Continue</button>
                    <button type="button" id="popup" style="display: none;" class="btn btn-success"
                        onclick="ShowPopUp()">Submit</button>
                </div>
            </div>

            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
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
                <div class="modal-body flex">

                    <h1>Select Payment Method ?</h1>

                    <select name="payment_method" id="Grades" class="level sel mt-4">
                        <option value="" disabled selected>Select</option>
                        <option value="Paypal">Paypal</option>
                        <option value="JazzCash">JazzCash</option>
                        <option value="Stripe">Stripe</option>
                        <option value="EasyPaisa">EasyPaisa</option>
                    </select>

                    <div class="currencyBtn  mt-5 flex">
                        <button type="button" class="btn btn-primary btn-lg get checkoutBtn">Checkout</button>
                    </div>

                    <div class="modalIcons flex pt-5">
                        <a href="https://www.paypal.com/pk/home" style="font-size: 3rem; color: #293246;">
                            <i class="fab fa-paypal pr-5 "></i>
                        </a>
                        <a href="https://stripe.com/en-gb-us" style="font-size: 3rem; color: #293246;">
                            <i class="fab fa-stripe pr-5"></i>
                        </a>

                        <a href="https://www.paypal.com/pk/home" style="font-size: 3rem; color: #293246;">
                            <i class="fab fa-cc-paypal pr-5"></i>
                        </a>

                        <a href="https://mea.mastercard.com/en-region-mea.html"
                            style="font-size: 3rem; color: #293246;">
                            <i class="fab fa-cc-mastercard pr-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@push('include-js')
<script src="{{ asset('asset/js/index.js') }}"></script>

<script>
    $('.checkoutBtn').on('click',function(){
        $('.billingForm').submit();
    })
</script>
@endpush
