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
                <div class="row" style="position: absolute;right:6.5%">
                    <div class="col-lg-12 col-md-12 col-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="frontPageContent">
                            <h1 class="display-4 d-flex">
                                Messages for
                                <div class="top-icons" style="line-height: 40px; position: absolute;right: 0;">
                                    @role('student')
                                    <span style="padding-left:2.3rem; padding-right: 2.3rem;"
                                        class="fas fa-user phone"><a
                                            href="{{route('tutor_profile',['id'=>$message_info->user_id])}}">
                                            View Profile
                                        </a>
                                    </span>
                                    @endrole
                                    <span style="padding-left:2.6rem; padding-right: 2.6rem;"
                                        class="fas fa-suitcase pay">
                                        <a href="{{route('show_tutor_job',['id'=>$message_info->post_id])}}">
                                            View Post
                                        </a>
                                    </span>
                                </div>
                            </h1>
                            <p class="pt-3">
                                {{$message_info->post}}
                            </p>
                            <hr class=" line w-25 mx-1">
                            <div id="messageBox" style="max-height: 450px;overflow: auto;">

                            </div>
                            <div class="d-flex" style="position: fixed;bottom: 20px;width: 86.9%;">
                                <div class="skillbutton w-100">
                                    <input id="BorderBott" class=" pt-2 pb-2 flex pl-2 msgToSend"
                                        style="width: 100% !important;" placeholder="Type a message here"
                                        name="message" />
                                </div>
                                <div class="top-icons">
                                    <span class="fa fa-comment message pl-4 pr-4 sendMsgBtn pb-3 pt-3">Send</span>
                                    {{-- <p style="display: inline; padding-left: 3rem;">
                                        See all messages for this post.
                                    </p> --}}
                                </div>
                            </div>
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

        // setInterval(() => {
        //     loadDefault();
        // }, 2500);



        $('.msgToSend').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                sendMSG()
                loadDefault();
            }
        });
        $('.sendMsgBtn').click(function(event){
            sendMSG()
            loadDefault();
        });
    });

    var get_messages_url = "{{route('get_messages',['id'=>request()->get('mThread')])}}";
    var send_messages_url = "{{route('send_message')}}";
    var get_message_notifications_url = "{{route('notification')}}";
    var mThread = "{{request()->get('mThread')}}";
    var other_user = "{{$message_info->user_id}}";

</script>

{{-- Chat Functions --}}
<script src="{{ asset('asset/js/chat.js') }}"></script>
@endpush
