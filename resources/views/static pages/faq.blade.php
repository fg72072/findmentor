@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<!-- Home Page Styling -->
<link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/static-pages.css') }}">
<!-- Home Page Styling -->
@endpush

@section('content')
<div class="container content">
    <div class="row mb-5 pl-4 pr-4">
        <!-- Begin Content -->
        <div class="" style="width:700px; margin:0 auto;">
            <h1 class="mt-5 mb-2">Frequently Asked Questions</h1>
            <div class="mt-2 mb-5" style="overflow: auto;">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-addon">
                        <i class="fa fa-search" style="width:28px;"></i>
                    </div>
                    <input id="filter" class="form-control rounded-0 u-form-control" name="filter" type="text"
                        placeholder="Search FAQs" style="height: 48px;">
                </div>
            </div>
            <!-- showing the Faq category name -->
            <div class="qaCategoryBlock">
                <h3 class="padding-left-10 qaCategory">Online teaching</h3>
                <!-- use this code to create dynamic id, inside below loop. -->
                <div class="padding-left-15 ">
                    <!-- showing que & ans available in that FAQ category -->
                    <ol class="accordion1">
                        <li class="qaBlock">
                            <div class="question">What is online teaching?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>Online teaching is the practice of teaching to an individual or a group online.
                                        It's live-real time-instruction where the teacher and student(s) are in
                                        different locations. When teaching online, you can teach anyone anywhere from
                                        the comfort of your home. Learn <a href="/online-teaching-guide">how to teach
                                            online</a>.</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">Who can teach online?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>To be an online teacher:</p>
                                    <ul>
                                        <li>You should have basic computer skills.</li>
                                        <li>A good internet connection and a computer/laptop.</li>
                                        <li>Command of the subject you are going to teach.</li>
                                        <li>Digital pen (for most academic subjects).</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">How much can I earn while teaching online?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>This question makes sense only when someone is employing you. If a company is
                                        hiring you directly, you should ask them. If however, you work independently,
                                        then it works the same way as it worked before the internet:</p>
                                    <p><strong>You charge as much as you want.</strong></p>
                                    <p>Teachers registered on FindMentor.com charge from less than $1 to over $100 per
                                        hour. Everyone charges based on their skills, living standard, the country they
                                        are in, existing clientele, and the demand for their particular skill.</p>

                                    <p>If you are not sure what to charge, start from the minimum and increase gradually
                                        as you get more experienced. You can also check what others are charging <a
                                            href="/tutors">here</a>.</p>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">What are the timings for online teaching?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>Unless you are employed by a company, you can decide the timing yourself. Since
                                        online teaching is global and different individuals have different preferences,
                                        you should talk to the students and come to an agreement regarding the time that
                                        suits you and the student. I know teachers who go on a trip and take their
                                        laptop with them, enjoy during the day and teach from their hotel room at night.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">How fast should I be able to type to teach online?
                            </div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>There is no minimum speed limit. However, the faster you type, the better is
                                        student experience due to less waiting time.&nbsp;</p>

                                    <p>If you don't type sufficiently fast enough, you can type the lesson and
                                        assessments before the session and just copy-paste during the session. Using a
                                        <a href="/online-teaching-guide#online-whiteboards">whiteboard</a> with a
                                        digital pen also bypasses the need to type fast as you can draw directly on the
                                        screen.&nbsp;&nbsp;</p>

                                    <p>Given that most of us will spend a big chunk of our lives typing, it makes sense
                                        to learn to type fast. The proper way to type is to touch-type i.e. typing
                                        without looking at the keyboard. It took me about one month, one hour per day,
                                        to learn to type at pro speeds. I used typing master software. Now you can use
                                        typing software like Typingbolt.</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">How to teach online?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You can teach online by using:</p>
                                    <ul>
                                        <li>Communication tools and screen sharing
                                            <ul>
                                                <li>Skype</li>
                                                <li>Google Hangouts</li>
                                            </ul>
                                        </li>
                                        <li>Online whiteboards
                                            <ul>
                                                <li>AwwApp.com</li>
                                                <li>Idroo.com</li>
                                            </ul>
                                        </li>
                                        <li>Remote access and Screen sharing
                                            <ul>
                                                <li>Teamviewer.com</li>
                                                <li>Anydesk.com</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>For details please check our <a href="/online-teaching-guide">detailed guide on
                                            online teaching</a>.</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">Do I need digital pen to teach online?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You don't always need a digital pen but it's an advantage. If you are teaching
                                        someone to code, you are mostly typing so you don't need a digital pen.&nbsp;
                                    </p>

                                    <p>If however, you are teaching Maths or Physics and you have to draw figures on an
                                        <a href="/online-teaching-guide#online-whiteboard">online whiteboard</a> to
                                        explain, then a&nbsp;digital pen is a must.</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">Do I need a webcam to teach online?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>It depends on the student's requirements. From my experience, most adult students
                                        prefer not to have a webcam. However, most parents of kids want the webcam to
                                        keep the child engaged.&nbsp;</p>

                                    <p>So here's what you should do. Keep a webcam. It's cheap. When you get a student,
                                        just ask them if they would like to see you and proceed accordingly.</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">How to collect payment for online work?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You can ask to be paid via <a
                                            href="/blog/get-payments-via-FindMentor">FindMentor's
                                            escrow system</a>, directly in the bank, Transferwise, PayPal, Western
                                        Union, Payoneer. Check <a
                                            href="/online-teaching-guide#howToReceivePayments">details about these
                                            payment options</a>.&nbsp;</p>
                                </div>
                            </div>
                        </li>
                        <li class="qaBlock">
                            <div class="question">How to find students to teach online?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>Register at FindMentor.com and make an attractive profile. Don't rush through
                                        while making your profile. Take time and do it right. Consider it as an
                                        investment. Contact on posted jobs with relevant and personalized
                                        messages.&nbsp;</p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- showing the Faq category name -->
            <div class="qaCategoryBlock">
                <h3 class="padding-left-10 qaCategory">For Students</h3>

                <!-- use this code to create dynamic id, inside below loop. -->

                <div class="padding-left-15 ">
                    <!-- showing que & ans available in that FAQ category -->
                    <ol class="accordion2">
                        <li class="qaBlock">
                            <div class="question">When will the teacher reply?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>Most teachers reply within 24 hours. In any case, if you haven't received a reply
                                        in 48 hours, we recommend that you contact others.</p>

                                    <p>You can also <a href="/post-requirement">post requirements</a> so interested
                                        teachers can contact you.</p>
                                </div>
                            </div>
                        </li>

                        <li class="qaBlock">
                            <div class="question">How to close requirement?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You can close/manage&nbsp;your requirements at <a href="/myJobPosts">My
                                            posts</a>.</p>
                                </div>
                            </div>
                        </li>

                    </ol>
                </div>
            </div>

            <!-- showing the Faq category name -->
            <div class="qaCategoryBlock">
                <h3 class="padding-left-10 qaCategory">Coins</h3>

                <!-- use this code to create dynamic id, inside below loop. -->

                <div class="padding-left-15 ">
                    <!-- showing que & ans available in that FAQ category -->
                    <ol class="accordion3">


                        <li class="qaBlock">
                            <div class="question">Why are coins not credited after payment?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>When paying with certain payment methods, sometimes money gets deducted from your
                                        end but doesn't reach us.</p>

                                    <p>If this happens, whenever we get your money, we credit coins immediately and send
                                        you an email confirmation. This usually happens within a day.</p>

                                    <p>If we don't get the money at all, it is automatically refunded to your account by
                                        your bank. The refund process can take up to two weeks.&nbsp;</p>
                                </div>
                            </div>
                        </li>

                        <li class="qaBlock">
                            <div class="question">How to get free coins?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>If anybody registers after visiting <a href="/referAndEarn">your referral
                                            link</a>, you will get coins when they join. You will also get coins when
                                        they buy coins. See <a href="/refer-and-earn-coins">details about referral</a>.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="qaBlock">
                            <div class="question">Is it mandatory to buy coins?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p><strong>For teachers:</strong></p>

                                    <p style="margin-left: 40px;"><strong>Short answer</strong>:<br>
                                        It's not mandatory to buy coins. We will send you an email for any job which is
                                        free, and you may apply on the same.</p>

                                    <p style="margin-left: 40px;"><strong>Nuanced reality</strong>:<br>
                                        It depends. If you are competing for a subject like Online Maths tutoring, you
                                        have a lot of competition. There is absolutely no way that a post like
                                        that&nbsp;will ever become free.&nbsp;<br>
                                        On the other hand, let's say that you teach Rocket science, you would have
                                        little to no competition. Therefore for a Rocket Science post, you won't
                                        need&nbsp;coins - just patience for&nbsp;36 hours.&nbsp;<br>
                                        It also depends on the location of the student and if the post is for home
                                        tutoring or online, budget, etc.<br>
                                        Therefore, you will just need to try it out and see what's truth like for you.
                                    </p>

                                    <p><strong>For Students:</strong></p>

                                    <p style="margin-left: 40px;">We give you enough coins to contact 3 teachers. Once
                                        you have used these free coins, you can buy coins to contact more teachers.</p>

                                    <p style="margin-left: 40px;">If you don't want to buy coins, you can just <a
                                            href="/post-requirement">post your requirement</a> and relevant teachers
                                        will contact you.</p>
                                </div>
                            </div>
                        </li>

                    </ol>
                </div>
            </div>

            <!-- showing the Faq category name -->
            <div class="qaCategoryBlock">
                <h3 class="padding-left-10 qaCategory">Account management</h3>

                <!-- use this code to create dynamic id, inside below loop. -->

                <div class="padding-left-15 ">
                    <!-- showing que & ans available in that FAQ category -->
                    <ol class="accordion4">


                        <li class="qaBlock">
                            <div class="question">How to change my phone number?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>Teachers can manage phone numbers by going to Menu &gt; Edit Profile &gt; <a
                                            href="/userPhone">Phone</a>.</p>

                                    <p>Students can manage phone numbers by going to Menu &gt; Settings &gt;&nbsp;<a
                                            href="/userPhone">Phone</a>.</p>
                                </div>
                            </div>
                        </li>

                        <li class="qaBlock">
                            <div class="question">How to change my email?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You can change your email by going to <a href="/changeMyEmail">Change Email
                                            page</a>.</p>
                                </div>
                            </div>
                        </li>

                        <li class="qaBlock">
                            <div class="question">How to delete my account?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You can delete your account by going to <a href="/profileSettings">profile
                                            settings</a>.</p>
                                </div>
                            </div>
                        </li>

                    </ol>
                </div>
            </div>

            <!-- showing the Faq category name -->
            <div class="qaCategoryBlock">
                <h3 class="padding-left-10 qaCategory">For teachers</h3>

                <!-- use this code to create dynamic id, inside below loop. -->

                <div class="padding-left-15 ">
                    <!-- showing que & ans available in that FAQ category -->
                    <ol class="accordion5">


                        <li class="qaBlock">
                            <div class="question">How to collect payment for online work?</div>
                            <div class="answer margin-bottom-20">
                                <div>
                                    <p>You can ask to be paid via <a
                                            href="/blog/get-payments-via-FindMentor">FindMentor's
                                            escrow system</a>, directly in the bank, Transferwise, PayPal, Western
                                        Union, Payoneer. Check <a
                                            href="/online-teaching-guide#howToReceivePayments">details about these
                                            payment options</a>.&nbsp;</p>
                                </div>
                            </div>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
</div>
@stop

@push('include-js')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>
    $( ".accordion1" ).accordion({event:false, active :false, heightStyle: "content" });
var noSections1 = $(".accordion1 .question").length-1;
$(".accordion1 .question").each(function (index, element)
{
    $(element).click(function()
    {
       if($(this).hasClass('ui-state-active'))
       {
           if(index < noSections1)
              $(".accordion1").accordion('option','active',index + 1);
           else
              $(".accordion1").accordion('option','active',index - 1);
       }
       else
       {
          $(".accordion1").accordion('option','active',index);
       }
   });
});


$( ".accordion2" ).accordion({event:false, active :false, heightStyle: "content" });
var noSections2 = $(".accordion2 .question").length-1;
$(".accordion2 .question").each(function (index, element)
{
    $(element).click(function()
    {
       if($(this).hasClass('ui-state-active'))
       {
           if(index < noSections2)
              $(".accordion2").accordion('option','active',index + 1);
           else
              $(".accordion2").accordion('option','active',index - 1);
       }
       else
       {
          $(".accordion2").accordion('option','active',index);
       }
   });
});


$( ".accordion3" ).accordion({event:false, active :false, heightStyle: "content" });
var noSections3 = $(".accordion3 .question").length-1;
$(".accordion3 .question").each(function (index, element)
{
    $(element).click(function()
    {
       if($(this).hasClass('ui-state-active'))
       {
           if(index < noSections3)
              $(".accordion3").accordion('option','active',index + 1);
           else
              $(".accordion3").accordion('option','active',index - 1);
       }
       else
       {
          $(".accordion3").accordion('option','active',index);
       }
   });
});


$( ".accordion4" ).accordion({event:false, active :false, heightStyle: "content" });
var noSections4 = $(".accordion4 .question").length-1;
$(".accordion4 .question").each(function (index, element)
{
    $(element).click(function()
    {
       if($(this).hasClass('ui-state-active'))
       {
           if(index < noSections4)
              $(".accordion4").accordion('option','active',index + 1);
           else
              $(".accordion4").accordion('option','active',index - 1);
       }
       else
       {
          $(".accordion4").accordion('option','active',index);
       }
   });
});



$( ".accordion5" ).accordion({event:false, active :false, heightStyle: "content" });
var noSections5 = $(".accordion5 .question").length-1;
$(".accordion5 .question").each(function (index, element)
{
    $(element).click(function()
    {
       if($(this).hasClass('ui-state-active'))
       {
           if(index < noSections5)
              $(".accordion5").accordion('option','active',index + 1);
           else
              $(".accordion5").accordion('option','active',index - 1);
       }
       else
       {
          $(".accordion5").accordion('option','active',index);
       }
   });
});


let questions=$('.qaBlock');
$('#filter').on('keyup',function() {
    let text = $(this).val();

    $('.qaBlock').hide();

    questions.each(function( index ) {
        if($( this ).find('.question').text().includes(text) || $( this ).find('.answer').text().includes(text)){
            $( this ).show()
        }

        $('.qaCategoryBlock').each(function( index ) {

            let co = $(this).find('.qaBlock').filter(function() {
                return $(this).css('display') == 'none';
            }).length;

            if($(this).find('.qaBlock').length == co){
                $(this).hide()
            }else{
               $(this).show()
            }

        });
    });
})

</script>
@endpush

@section('footer')
@include('includes.footer')
@stop
