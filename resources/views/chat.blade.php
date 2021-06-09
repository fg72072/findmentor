@extends('layouts.app')

@section('title')
Tutor | Chat
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/AllMessages.css') }}">
@endpush

@section('content')
<section>
    <div class="FrontPage">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12">
                        <div class="frontPageContent">
                            <h1 class="display-4">
                                Messages for
                            </h1>
                            <p class="pt-3">
                                Online Physics assignment help teacher required in gulistan e johar.
                            </p>
                            <hr class=" line w-25 mx-1">
                            <h2 class=" pt-3">
                                Syed Wasi
                                <span class="pl-5"> 3 June </span>
                            </h2>
                            <p class="pt-3">
                                Hi, Dear student how can i help you ?
                            </p>
                            <div class="skillbutton">
                                <textarea id="BorderBott" class=" pt-2 flex pl-2" style="width: 100% !important;"
                                    placeholder="Type a message here" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="top-icons" style="line-height: 50px;">
                                <span class="fa fa-comment message pl-4 pr-4"><a href="./Message.html">Send</a></span>
                                <p style="display: inline; padding-left: 3rem;">
                                    See all messages for this post.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="top-icons" style="line-height: 50px; padding-top: 6rem;">
                            <span style="padding-left:2rem; padding-right: 2rem;" class="fa fa-comment message"><a
                                    href="./SpecificMessage.html">Read & Reply</a></span>
                            <span style="padding-left:2.3rem; padding-right: 2.3rem;" class="fas fa-user phone"><a
                                    href="#">View Profile</a></span>
                            <span style="padding-left:2.6rem; padding-right: 2.6rem;" class="fas fa-suitcase pay"><a
                                    href="#"> View Post </a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
