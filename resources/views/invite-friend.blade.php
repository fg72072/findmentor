@extends('layouts.app')

@section('title')
Tutor | Refer & Earn
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/Invite.css') }}">
@endpush

@section('content')
<section>
    <div class="banner flex">
        <div class="container">
            <div class="row flex">
                <div class="col-lg-8  col-md-12 col-12 settingOuter2">
                    <h3 class="cross" style="text-align: end; padding: 1rem 1rem;">X</h3>
                    <div class="Emailpg pt-2">
                        <i class="shield fas fa-user-plus display-3 pt-3" style="color: #0076cb;"></i>
                        <h1 class="pt-4" style="font-weight: bold; letter-spacing: 2px;">Invite Friends</h1>
                        <hr class="w-25 mx-auto">
                    </div>
                    <div class="form pt-3">
                        <h4 class="Info">Invite your Friends</h4>
                        <p>We will put your referral link in the invite so you get coins when someone you invite joins
                            us.
                        </p>

                        <button onclick="auth();" id="SignInGoogle" type="button" class="btn btn-primary btn-lg mt-3"
                            style="padding:0.3rem 2rem; display: inline; ">
                            Invite via Google
                        </button>
                        <button data-toggle="modal" data-target="#myModal" type="button"
                            class="btn btn-primary btn-lg mt-3"
                            style="padding:0.3rem 2rem; display: inline; margin-left: 3rem; ">
                            Invite via Email
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invite Friends</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('send-invitation')}}" method="POST">
                        @csrf
                        <fieldset>
                            <section>
                                <label>Email <span class="color-red">*</span> </label>
                                <label class="input">
                                    <textarea rows="8" name="friendsEmail" id="friendsEmail" class="form-control"
                                        style="resize: none;"></textarea>
                                </label>
                                <div class="note" style="color: red; display: none" id="errorNote"> </div>
                                <div class="note">Note: Please enter all the emails you want to invite.</div>
                            </section>
                            <button type="submit" id="btnInviteFriendsTxtBox" class="btn-u btn-u-dark-sea">
                                Invite Friends
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@push('include-js')
<script src="https://apis.google.com/js/client.js"></script>
<script src="{{ asset('asset/js/Invite.js') }}"></script>
<script>
    function auth() {
        var config = {
            'client_id': '20951334698-nuo8trropqe3pe1af6ctj6g57s9m7hcm.apps.googleusercontent.com',
            'scope': 'https://www.google.com/m8/feeds'
        };
        gapi.auth.authorize(config, function() {
            fetch(gapi.auth.getToken());
        });
    }


    function fetch(token) {
        // console.log("https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&alt=json")
        $.ajax({
        url: "https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&alt=json",
        headers: {
            'Access-Control-Allow-Credentials' : true,
            'Access-Control-Allow-Origin': 'http://localhost/findmentor',
            'Access-Control-Allow-Methods':'GET',
            'Access-Control-Allow-Headers':'application/json',
             },
        type: "GET",
            crossDomain: true,
            dataType: "jsonp",
            jsonp: 'jsonp-callback',
        async: false,
        success:function(data) {
            console.log(JSON.stringify(data));
        }

        })

    }

</script>
@endpush
