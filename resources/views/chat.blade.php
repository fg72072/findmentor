@extends('layouts.app')

@section('title')
Tutor | Chat
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/AllMessages.css') }}">
<style>
    #messageBox::-webkit-scrollbar {
        display: none !important;
    }

</style>
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
                                {{$message_info->post}}
                            </p>
                            <hr class=" line w-25 mx-1">
                            <div id="messageBox" style="max-height: 490px;overflow: auto;">

                            </div>
                            <div class="skillbutton">
                                <input id="BorderBott" class=" pt-2 flex pl-2 msgToSend" style="width: 100% !important;"
                                    placeholder="Type a message here" name="message" />
                            </div>
                            <div class="top-icons" style="line-height: 50px;">
                                <span class="fa fa-comment message pl-4 pr-4 sendMsgBtn">Send</span>
                                <p style="display: inline; padding-left: 3rem;">
                                    See all messages for this post.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="top-icons" style="line-height: 50px; padding-top: 6rem;">
                            <span style="padding-left:2.3rem; padding-right: 2.3rem;" class="fas fa-user phone"><a
                                    href="{{route('tutor_profile',['id'=>$message_info->user_id])}}">View
                                    Profile</a></span>
                            <span style="padding-left:2.6rem; padding-right: 2.6rem;" class="fas fa-suitcase pay"><a
                                    href="{{route('show_tutor_job',['id'=>$message_info->post_id])}}"> View Post
                                </a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@push('include-js')
<script>
    $(document).ready(function () {
        loadDefault();

        setInterval(() => {
            loadDefault();
        }, 2500);

        $('.msgToSend').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                sendMSG()
            }
        });
        $('.sendMsgBtn').click(function(event){
            sendMSG()
        });
    });

    function loadDefault()
    {
        var oldscrollHeight = $("#messageBox")[0].scrollHeight - 20;
        $.ajax({
            url:"{{route('get_messages')}}",
            type: 'get',
            success: function (response) {
                $('#messageBox').html(response);

                //Auto-scroll
                var newscrollHeight = $("#messageBox")[0].scrollHeight - 20;
                if(newscrollHeight > oldscrollHeight){
                    $("#messageBox").animate({ scrollTop: newscrollHeight }, 'normal');
                }
            },
        });
    }

    function sendMSG()
    {
        var token = $('meta[name="csrf-token"]').attr('content');
        var msg = $('.msgToSend').val();

        if(msg.length == 0){
            return false;
        }

        $.ajax({
            url:"{{route('send_message')}}",
            type: 'POST',
            async: true,
            data: {'_token': token ,'message':msg},
            success: function (response) {
                console.log(response);
                $('.msgToSend').val('');
            },
        });
    }
</script>
@endpush
