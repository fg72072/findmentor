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
<link rel="stylesheet" href="{{ asset('asset/css/contact-form.css') }}">
<!-- Home Page Styling -->
@endpush

@section('content')
<div class="container content no-padding-top mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row" style="max-width:830px; margin:0 auto;">
                <div class="col-12">
                    <div class="container- singleColumnCenterParent withPadding ">
                        <div class="singleColumnCenterChild">
                            <div class="-" style="max-width:550px;">
                                <!-- delete modal start -->
                                <div class="modal small fade autoWidthModal wordBreak" id="deleteModel" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel"> Confirm to delete </h4>
                                            </div>
                                            <div class="modal-body stripeBg">
                                                <h5 class="modal-title"> Are you sure want to delete this record? </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="button" id="delModalBtn" class="btn btn-danger"> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete modal end -->


                                <div class="modal small fade autoWidthModal wordBreak" id="customErrorMsgModel"
                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h4 class="modal-title" id="customErrorMsgTitle"> </h4>
                                            </div>
                                            <div class="modal-body stripeBg">
                                                <h5 class="modal-title" id="customErrorMsg"> </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="errorCloseBtn" class="btn-u btn-u-red"
                                                    data-dismiss="modal"> Close </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-" id="contactUsDiv">
                                    <div class="headline-">
                                        <h1>Contact us</h1>
                                    </div>

                                    <div class="row- brand-page- margin-bottom-40 ">

                                        <div class="row- margin-bottom-30 hidden"></div>


                                        <form style="" action="{{route('contactPost')}}" method="post"
                                            id="contactUsForm" class="sky-form contact-style col-md-12-"
                                            novalidate="novalidate">
                                            @csrf
                                            <input type="hidden" name="" value="">
                                            <div id="showMeWhenContactKeyFoundDiv" style="display: none;">
                                                Name: (<a href="https://www.findmentor.com/contact">not ?</a>)
                                            </div>

                                            <div id="hideMeWhenContactKeyFoundDiv-">
                                                <div class="" data-showorder="0">
                                                    <label> I am contacting as a </label>
                                                    <label class="select state-success">
                                                        <select name="loginType" id="loginType" tabindex="1"
                                                            class="openSelectedAndHideOtherChild valid">
                                                            <option value=""> Please select </option>

                                                            <option value="#iAmStudent">Student</option>
                                                            <option value="#iAmTeacher">Tutor</option>
                                                            <option value="#iAmOther">Other</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </div>

                                                <div id="iAmStudent" style="display: none;" data-showorder="43">
                                                    <label for="Reason">I want help with</label>
                                                    <label class="select state-success">
                                                        <select name="student_reason" id="s_reason"
                                                            class="openSelectedAndHideOtherChild valid">
                                                            <option value="">--Select--</option>
                                                            <option value="#assignmenthelp">I am looking for Assignment
                                                                help</option>
                                                            <option value="#onlinetutoring">I want Tutoring</option>
                                                            <option value="#coinQuestionsStudents">Coins</option>
                                                            <option value="#changePassword">Change Password</option>
                                                            <option value=".otherContact">Other</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="suggestedAnswer" id="assignmenthelp" style="display: none;"
                                                    data-showorder="13">
                                                    <p>
                                                        Please click
                                                        <strong>
                                                            <a href="">here</a>
                                                        </strong>
                                                        for assignment help.
                                                    </p>
                                                </div>
                                                <div class="suggestedAnswer" id="onlinetutoring" style="display:none;">
                                                    <p>
                                                        Please
                                                        <strong>
                                                            <a href="">
                                                                Post your requirements
                                                            </a>
                                                        </strong>
                                                        so a relevant teacher can contact you.
                                                    </p>
                                                </div>

                                                <div id="iAmTeacher" style="display: none;" data-showorder="39">
                                                    <label for="Reason">How can we help you?</label>
                                                    <label class="select state-success">
                                                        <select name="tutor_reason" id="t_reason"
                                                            class="openSelectedAndHideOtherChild valid">
                                                            <option value="">--Select--</option>
                                                            <option value="#wantJob, #wantToTeachOnline">Find
                                                                jobs/students &amp; teach online</option>
                                                            <option value="#editMyProfile">Edit profile</option>
                                                            <option value="#reportFakeReview">Fake/false review
                                                            </option>
                                                            <option value="#coinQuestions">Coins</option>
                                                            <option value="#changePassword">Change Password</option>
                                                            <option value=".otherContact">Other</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                    <div class="clear"></div>
                                                </div>

                                                <div id="coinQuestionsStudents" style="display: none;"
                                                    data-showorder="14">
                                                    <label for="Reason" class="hidden">How can we help you?</label>
                                                    <label class="select">
                                                        <select id="coinQuestionsSelect"
                                                            class="openSelectedAndHideOtherChild">
                                                            <option value="">--Select--</option>
                                                            <option value="#whatAreCoinsStudents">What are coins?
                                                            </option>
                                                            <option value="#howToGetCoins">How to get coins?</option>
                                                            <option value="#unableToBuyCoins">Can't Buy coins</option>
                                                            <option value="#paidButNoCoins">Didn't get coins after
                                                                payment</option>
                                                            <option value=".otherContact">Other</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="suggestedAnswer" id="whatAreCoinsStudents"
                                                    style="display:none;">
                                                    <p>Coins are like having money. You can use coins to contact
                                                        teachers. You can read more about coins <a href="/coins"
                                                            target="_blank">here</a>.
                                                    </p>
                                                </div>

                                                <div id="coinQuestions" style="display: none;" data-showorder="30">
                                                    <label for="Reason" class="hidden">How can we help you?</label>
                                                    <label class="select">
                                                        <select id="coinQuestionsSelect"
                                                            class="openSelectedAndHideOtherChild">
                                                            <option value="">--Select--</option>
                                                            <option value="#whatAreCoins">What are coins?</option>
                                                            <option value="#howToGetCoins">How to get coins?</option>
                                                            <option value="#refundCoinsForJob">Refund for applying to
                                                                job</option>
                                                            <option value="#unableToBuyCoins">Can't Buy coins</option>
                                                            <option value="#paidButNoCoins">Didn't get coins after
                                                                payment</option>
                                                            <option value=".otherContact">Other</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                    <div class="clear"></div>
                                                </div>

                                                <div id="unableToBuyCoins" style="display:none;">
                                                    <label for="Reason" class="hidden"></label>
                                                    <label class="select">
                                                        <select class="openSelectedAndHideOtherChild"
                                                            id="unableToBuyCoinsSelect">
                                                            <option value="">--Select--</option>
                                                            <option value="#cardNotAccepted">Card is not accepted
                                                            </option>
                                                            <option value="#paymentMethodUnavailable">My payment method
                                                                is unavailable</option>
                                                            <option value="#noMoneyToBuyCoins">I don't have money
                                                            </option>
                                                            <option value=".otherContact">Other</option>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="suggestedAnswer" id="noMoneyToBuyCoins"
                                                    style="display:none;">
                                                    <p>It is not mandatory to buy coins. When a sufficient number of
                                                        tutors do not apply to a job, that job becomes free. <br>
                                                        We'll notify you when jobs relevant to your skills become free
                                                        and you can apply to them. In the meantime, you can try to <a
                                                            href="/refer-and-earn-coins" target="_blank">earn coins</a>.
                                                    </p>
                                                </div>


                                                <div class="suggestedAnswer" id="whatAreCoins" style="display:none;">
                                                    <p>Coins are like having money. You can use coins to contact
                                                        students and to activate Premium Membership. You can read more
                                                        about coins <a href="/coins" target="_blank">here</a>.
                                                    </p>
                                                </div>
                                                <div class="suggestedAnswer" id="howToGetCoins" style="display:none;">
                                                    <p>You can buy coins <a href="/buyCoins" target="_blank">here</a>.
                                                        Learn how to get coins for free <a href="/coins#howToGetCoins"
                                                            target="_blank">here</a>.</p>
                                                </div>
                                                <div class="suggestedAnswer" id="refundCoinsForJob"
                                                    style="display:none;">
                                                    <p>The coins are refunded only if a student with an <b>unverified
                                                            phone</b> number <b>doesn't see your message</b> within 15
                                                        days.</p>
                                                </div>
                                                <div class="suggestedAnswer" id="paidButNoCoins" style="display:none;">
                                                    <p>At times, it can take up to 2 days for the payment to reach us.
                                                        If we get the money, we will credit coins and notify you. <br>
                                                        If we don't receive your payment, you will get a refund in 7
                                                        working days automatically.</p>
                                                </div>

                                                <div class="suggestedAnswer" id="wantJob" style="display: none;"
                                                    data-showorder="27">
                                                    <p>We don't employ tutors directly. We notify registered teachers
                                                        when a relevant student needs help. <br>
                                                        Please <a href="https://www.teacheron.com/registerAsExpert">Sign
                                                            up</a> as a teacher so students can contact you directly.


                                                    </p>
                                                </div>
                                                <div id="wantToTeachOnline" style="display: none;" data-showorder="27">
                                                    <p> </p>
                                                </div>
                                                <div class="suggestedAnswer" id="reportFakeReview"
                                                    style="display: none;" data-showorder="29">
                                                    <p> To report a review, go to
                                                        the review section in your profile

                                                        and click the <i class="color-red fa fa-flag tooltips"
                                                            data-original-title="" title=""></i> button next to the
                                                        review. <br> We will hide the review while we investigate and
                                                        then delete the review if found ungenuine.</p>
                                                </div>
                                                <div class="suggestedAnswer" id="changePassword" style="display: none;"
                                                    data-showorder="32">
                                                    <p> You can change/reset your password <a
                                                            href="/preResetPwd.html">here</a> </p>
                                                </div>
                                                <div class="suggestedAnswer" id="editMyProfile" style="display: none;"
                                                    data-showorder="28">
                                                    <p> You can use the "Edit Profile" option in the menu, or use one of
                                                        the following links</p>
                                                    <ul class="">
                                                        <li><a href="https://www.teacheron.com/teachingDetails">Teaching
                                                                Details / Fee details</a></li>
                                                        <li><a href="https://www.teacheron.com/profileDescription">Profile
                                                                description</a></li>
                                                        <li><a href="https://www.teacheron.com/userDetail">Personal
                                                                Details </a></li>
                                                        <li><a href="https://www.teacheron.com/userPic">Photo</a></li>
                                                        <li><a
                                                                href="https://www.teacheron.com/tutorSubject">Subjects</a>
                                                        </li>
                                                        <li><a href="https://www.teacheron.com/userAddress">Address</a>
                                                        </li>
                                                        <li><a
                                                                href="https://www.teacheron.com/userEducation">Education</a>
                                                        </li>
                                                        <li><a
                                                                href="https://www.teacheron.com/userExperience">Experience</a>
                                                        </li>
                                                        <li><a href="https://www.teacheron.com/userPhone">Phone</a></li>
                                                    </ul>
                                                </div>

                                                <div class="suggestedAnswer" id="cardNotAccepted" style="display:none;">
                                                    <p>Please ensure that international transactions are active on your
                                                        card. If you are still unable to pay, use the card of a
                                                        friend/relative.</p>
                                                </div>

                                                <div id="paymentMethodUnavailable" style="display:none;">
                                                    <p>
                                                        I am from
                                                        <label class="select">
                                                            <select id="countryListbuyCoin" name="countryListbuyCoin"
                                                                class="form-control vertical-align-middle openSelectedAndHideOtherChild "
                                                                tabindex="" style="width:100%;">
                                                                <option value=""></option>
                                                                <option value="#paymentProblemCountryOther">Afghanistan
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Åland
                                                                    Islands </option>
                                                                <option value="#paymentProblemCountryOther">Albania
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Algeria
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">American
                                                                    Samoa </option>
                                                                <option value="#paymentProblemCountryOther">Andorra
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Angola
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Anguilla
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Antarctica
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Antigua and
                                                                    Barbuda </option>
                                                                <option value="#paymentProblemCountryOther">Argentina
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Armenia
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Aruba
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Australia
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Austria
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Azerbaijan
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Bahrain
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Bangladesh
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Barbados
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Belarus
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Belgium
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Belize
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Benin
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Bermuda
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Bhutan
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Bolivia
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Bosnia and
                                                                    Herzegovina </option>
                                                                <option value="#paymentProblemCountryOther">Botswana
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Brazil
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">British
                                                                    Indian Ocean Territory </option>
                                                                <option value="#paymentProblemCountryOther">British
                                                                    Virgin Islands </option>
                                                                <option value="#paymentProblemCountryOther">Brunei
                                                                    Darussalam </option>
                                                                <option value="#paymentProblemCountryOther">Bulgaria
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Burkina Faso
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Burundi
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Cambodia
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Cameroon
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Canada
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Cape Verde
                                                                </option>
                                                                <option value="#paymentProblemCountryOther">Caribbean
                                                                    Netherlands </option>
                                                                <option value="#paymentProblemCountryOther">Cayman
                                                                    Islands </option>
                                                                <option value="#paymentProblemCountryOther">Central
                                                                    African Republic </option>






                                                                <option value="#paymentProblemCountryOther">Chad
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Channel
                                                                    Islands </option>






                                                                <option value="#paymentProblemCountryOther">Chile
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">China
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Christmas
                                                                    Island </option>






                                                                <option value="#paymentProblemCountryOther">Colombia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Comoros
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Congo, Dem.
                                                                    Rep. </option>






                                                                <option value="#paymentProblemCountryOther">Congo, Rep.
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Costa Rica
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Cote
                                                                    d'Ivoire </option>






                                                                <option value="#paymentProblemCountryOther">Croatia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Cuba
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Curacao
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Cyprus
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Czech
                                                                    Republic </option>






                                                                <option value="#paymentProblemCountryOther">Denmark
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Djibouti
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Dominica
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Dominican
                                                                    Republic </option>






                                                                <option value="#paymentProblemCountryOther">Ecuador
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Egypt
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">El Salvador
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Equatorial
                                                                    Guinea </option>






                                                                <option value="#paymentProblemCountryOther">Eritrea
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Estonia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Ethiopia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Falkland
                                                                    Islands (Islas Malvinas) </option>






                                                                <option value="#paymentProblemCountryOther">Faroe
                                                                    Islands </option>






                                                                <option value="#paymentProblemCountryOther">Fiji
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Finland
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">France
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">French
                                                                    Guiana </option>






                                                                <option value="#paymentProblemCountryOther">French
                                                                    Polynesia </option>






                                                                <option value="#paymentProblemCountryOther">Gabon
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Georgia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Germany
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Ghana
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Gibraltar
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Greece
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Greenland
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Grenada
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Guadeloupe
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Guam
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Guatemala
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Guernsey
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Guinea
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">
                                                                    Guinea-Bissau </option>






                                                                <option value="#paymentProblemCountryOther">Guyana
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Haiti
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Honduras
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Hong Kong
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Hungary
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Iceland
                                                                </option>





                                                                <option value="#paymentProblemCountry111">India
                                                                </option>







                                                                <option value="#paymentProblemCountryOther">Indonesia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Iran
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Iraq
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Ireland
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Isle of Man
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Israel
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Italy
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Jamaica
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Japan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Jersey
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Jordan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Kazakhstan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Kenya
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Kiribati
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Kosovo
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Kuwait
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Kyrgyz
                                                                    Republic </option>






                                                                <option value="#paymentProblemCountryOther">Lao PDR
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Latvia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Lebanon
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Lesotho
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Liberia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Libya
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">
                                                                    Liechtenstein </option>






                                                                <option value="#paymentProblemCountryOther">Lithuania
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Luxembourg
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Macau
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Macedonia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Madagascar
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Malawi
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Malaysia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Maldives
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mali
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Malta
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Marshall
                                                                    Islands </option>






                                                                <option value="#paymentProblemCountryOther">Martinique
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mauritania
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mauritius
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mayotte
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mexico
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Micronesia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Moldova
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Monaco
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mongolia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Montenegro
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Morocco
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Mozambique
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Myanmar
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Namibia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Nauru
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Nepal
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Netherlands
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">New
                                                                    Caledonia </option>






                                                                <option value="#paymentProblemCountryOther">New Zealand
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Nicaragua
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Niger
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Nigeria
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">North Korea
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Northern
                                                                    Mariana Islands </option>






                                                                <option value="#paymentProblemCountryOther">Norway
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Oman
                                                                </option>





                                                                <option value="#paymentProblemCountry191">Pakistan
                                                                </option>







                                                                <option value="#paymentProblemCountryOther">Palau
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Palestine
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Panama
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Papua New
                                                                    Guinea </option>






                                                                <option value="#paymentProblemCountryOther">Paraguay
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Peru
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Philippines
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Poland
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Portugal
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Puerto Rico
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Qatar
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Reunion
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Romania
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Russian
                                                                    Federation </option>






                                                                <option value="#paymentProblemCountryOther">Rwanda
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Saint
                                                                    Barthélemy </option>






                                                                <option value="#paymentProblemCountryOther">Saint
                                                                    Helena, Ascension and Tristan da Cunha </option>






                                                                <option value="#paymentProblemCountryOther">Saint Pierre
                                                                    and Miquelon </option>






                                                                <option value="#paymentProblemCountryOther">Samoa
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">San Marino
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Sao Tome and
                                                                    Principe </option>






                                                                <option value="#paymentProblemCountryOther">Saudi Arabia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Senegal
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Serbia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Seychelles
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Sierra Leone
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Singapore
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Sint Maarten
                                                                    (Dutch part) </option>






                                                                <option value="#paymentProblemCountryOther">Slovakia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Slovenia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Solomon
                                                                    Islands </option>






                                                                <option value="#paymentProblemCountryOther">Somalia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">South Africa
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">South Korea
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">South Sudan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Spain
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Sri Lanka
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">St. Kitts
                                                                    and Nevis </option>






                                                                <option value="#paymentProblemCountryOther">St. Lucia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">St. Martin
                                                                    (French part) </option>






                                                                <option value="#paymentProblemCountryOther">St. Vincent
                                                                    and the Grenadines </option>






                                                                <option value="#paymentProblemCountryOther">Sudan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Suriname
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Swaziland
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Sweden
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Switzerland
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Syrian Arab
                                                                    Republic </option>






                                                                <option value="#paymentProblemCountryOther">Taiwan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Tajikistan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Tanzania
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Thailand
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">The Bahamas
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">The Gambia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Timor-Leste
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Togo
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Tokelau
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Tonga
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Trinidad and
                                                                    Tobago </option>






                                                                <option value="#paymentProblemCountryOther">Tunisia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Turkey
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Turkmenistan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Turks and
                                                                    Caicos Islands </option>






                                                                <option value="#paymentProblemCountryOther">Tuvalu
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Uganda
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Ukraine
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">United Arab
                                                                    Emirates </option>






                                                                <option value="#paymentProblemCountryOther">United
                                                                    Kingdom </option>






                                                                <option value="#paymentProblemCountryOther">United
                                                                    States </option>






                                                                <option value="#paymentProblemCountryOther">United
                                                                    States Minor Outlying Islands </option>






                                                                <option value="#paymentProblemCountryOther">Uruguay
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Uzbekistan
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Vanuatu
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Vatican City
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Venezuela
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Vietnam
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Virgin
                                                                    Islands (U.S.) </option>






                                                                <option value="#paymentProblemCountryOther">Wallis and
                                                                    Futuna </option>






                                                                <option value="#paymentProblemCountryOther">Western
                                                                    Sahara </option>






                                                                <option value="#paymentProblemCountryOther">Yemen, Rep.
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Zambia
                                                                </option>






                                                                <option value="#paymentProblemCountryOther">Zimbabwe
                                                                </option>



                                                            </select>
                                                            <i></i>
                                                        </label>
                                                    </p>
                                                    <div class="suggestedAnswer">
                                                        <div id="paymentProblemCountry111" data-name="India"
                                                            style="display:none;">
                                                            <p>We accept cards, UPI, NetBanking, PayPal, Amazon Pay and
                                                                some other wallets all of which you can find in Razorpay
                                                                payment options.</p>

                                                            <p><b>Do you accept Paytm?</b><br>
                                                                No.</p>
                                                            <p><b>Can I deposit in your bank account directly?</b><br>
                                                                No. </p>
                                                        </div>
                                                        <div id="paymentProblemCountry191" data-name="Pakistan"
                                                            style="display:none;">
                                                            <div style="padding-left:15px;">
                                                                <p class="bold">We only accept cards from your location.
                                                                </p>
                                                                <p> <b>Can I pay by EasyPaisa, JazzCash, Skrill,
                                                                        Payoneer, Western Union?</b> <br>
                                                                    No. We only accept credit/debit cards from Pakistan.
                                                                    Your card has to be enabled for international
                                                                    transactions.
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <div id="paymentProblemCountryOther"
                                                            data-name="paymentProblemCountryOther"
                                                            style="display:none;">
                                                            <h3 class="no-margin-top hidden">Usual payment questions
                                                            </h3>
                                                            <div style="padding-left:15px;">
                                                                <p>
                                                                    We only accept cards, PayPal from your location.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- <div id="affiliate_reason">
                                        <label for="Reason">Agenda/Reason</label>
                                        <label class="select">
                                            <select name="affiliate_reason" id="a_reason">
                                                <option>--Select--</option>
                                                <option value="technical">I am facing Technical difficulties</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </label>
                                    </div> -->

                                                <div id="iAmOther" style="display: none;" data-showorder="41">
                                                    <label for="Reason">How can we help?</label>
                                                    <label class="select state-success">
                                                        <select name="other_reason" id="o_reason"
                                                            class="openSelectedAndHideOtherChild valid">
                                                            <option value="">--Select--</option>
                                                            <!-- <option value=".otherContact">I want to report a bug</option> -->
                                                            <option value="#guestPost">I want to guest post</option>
                                                            <option value="#buySellData">I want to buy/sell data
                                                            </option>
                                                            <option value="#marketingServices">I want to offer marketing
                                                                services</option>
                                                            <option value=".otherContact">Other</option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="suggestedAnswer" id="guestPost" style="display: none;"
                                                    data-showorder="21">
                                                    <p>We don't accept any guest postings.</p>
                                                </div>
                                                <div class="suggestedAnswer" id="buySellData" style="display: none;"
                                                    data-showorder="7">
                                                    <p>We don't buy or sell data.</p>
                                                </div>
                                                <div class="suggestedAnswer" id="marketingServices"
                                                    style="display: none;" data-showorder="22">
                                                    <p>We don't use any external marketing services.</p>
                                                </div>

                                                <div>
                                                    <button type="button"
                                                        class="btn-u btn-brd btn-brd-hover rounded btn-u-red btn-u-xs margin-top-20"
                                                        id="stillNeedHelp" data-show=".otherContact"
                                                        data-hide="#stillNeedHelp" style="display: none;">I still need
                                                        help with this</button>
                                                </div>
                                                <br>
                                                <div class="no-padding margin-top-20 otherContact" id="otherContact"
                                                    style="display: none;" data-showorder="44">

                                                    <textarea class="hidden" name="contactReason" id="contactReason"
                                                        style="resize: none;"></textarea>

                                                    <div class="hideMeWhenContactKeyFoundDiv">
                                                        <section>
                                                            <label>Name </label>
                                                            <label class="input">
                                                                <input type="text" maxlength="100" name="name" id="name"
                                                                    class="form-control" value="" required>
                                                            </label>
                                                        </section>
                                                    </div>

                                                    <div class="hideMeWhenContactKeyFoundDiv">
                                                        <section>
                                                            <label>Email </label>
                                                            <label class="input">
                                                                <input type="text" name="email" id="email"
                                                                    class="form-control" value="" required>
                                                            </label>
                                                        </section>
                                                    </div>

                                                    <div class="">
                                                        <label> Contact No. </label> <br>
                                                        <div class="inline-group inline">
                                                            <div class="phoneCodeDiv">
                                                                <span class="state-success">
                                                                    <select id="phoneCode" name="phoneCode"
                                                                        style="width: 150px !important;"
                                                                        data-placeholder="Code"
                                                                        class="phone-code-select2 form-control vertical-align-middle select2-hidden-accessible valid"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <option value=""> </option>
                                                                        <option value="93">+93 Afghanistan </option>
                                                                        <option value="358">+358 Åland Islands </option>
                                                                        <option value="355">+355 Albania </option>
                                                                        <option value="213">+213 Algeria </option>
                                                                        <option value="1684">+1684 American Samoa
                                                                        </option>
                                                                        <option value="376">+376 Andorra </option>
                                                                        <option value="244">+244 Angola </option>
                                                                        <option value="1264">+1264 Anguilla </option>
                                                                        <option value="672">+672 Antarctica </option>
                                                                        <option value="1268">+1268 Antigua and Barbuda
                                                                        </option>
                                                                        <option value="54">+54 Argentina </option>
                                                                        <option value="374">+374 Armenia </option>
                                                                        <option value="297">+297 Aruba </option>
                                                                        <option value="61">+61 Australia </option>
                                                                        <option value="43">+43 Austria </option>
                                                                        <option value="994">+994 Azerbaijan </option>
                                                                        <option value="973">+973 Bahrain </option>
                                                                        <option value="880">+880 Bangladesh </option>
                                                                        <option value="1246">+1246 Barbados </option>
                                                                        <option value="375">+375 Belarus </option>
                                                                        <option value="32">+32 Belgium </option>






                                                                        <option value="501">+501 Belize </option>






                                                                        <option value="229">+229 Benin </option>






                                                                        <option value="1441">+1441 Bermuda </option>






                                                                        <option value="975">+975 Bhutan </option>






                                                                        <option value="591">+591 Bolivia </option>






                                                                        <option value="387">+387 Bosnia and Herzegovina
                                                                        </option>






                                                                        <option value="267">+267 Botswana </option>






                                                                        <option value="55">+55 Brazil </option>






                                                                        <option value="246">+246 British Indian Ocean
                                                                            Territory </option>






                                                                        <option value="1284">+1284 British Virgin
                                                                            Islands </option>






                                                                        <option value="673">+673 Brunei Darussalam
                                                                        </option>






                                                                        <option value="359">+359 Bulgaria </option>






                                                                        <option value="226">+226 Burkina Faso </option>






                                                                        <option value="257">+257 Burundi </option>






                                                                        <option value="855">+855 Cambodia </option>






                                                                        <option value="237">+237 Cameroon </option>






                                                                        <option value="1">+1 Canada </option>






                                                                        <option value="238">+238 Cape Verde </option>






                                                                        <option value="599">+599 Caribbean Netherlands
                                                                        </option>






                                                                        <option value="1345">+1345 Cayman Islands
                                                                        </option>






                                                                        <option value="236">+236 Central African
                                                                            Republic </option>






                                                                        <option value="235">+235 Chad </option>






                                                                        <option value="44">+44 Channel Islands </option>






                                                                        <option value="56">+56 Chile </option>






                                                                        <option value="86">+86 China </option>






                                                                        <option value="61">+61 Christmas Island
                                                                        </option>






                                                                        <option value="57">+57 Colombia </option>






                                                                        <option value="269">+269 Comoros </option>






                                                                        <option value="243">+243 Congo, Dem. Rep.
                                                                        </option>






                                                                        <option value="242">+242 Congo, Rep. </option>






                                                                        <option value="506">+506 Costa Rica </option>






                                                                        <option value="225">+225 Cote d'Ivoire </option>






                                                                        <option value="385">+385 Croatia </option>






                                                                        <option value="53">+53 Cuba </option>






                                                                        <option value="5999">+5999 Curacao </option>






                                                                        <option value="357">+357 Cyprus </option>






                                                                        <option value="420">+420 Czech Republic
                                                                        </option>






                                                                        <option value="45">+45 Denmark </option>






                                                                        <option value="253">+253 Djibouti </option>






                                                                        <option value="1767">+1767 Dominica </option>






                                                                        <option value="1">+1 Dominican Republic
                                                                        </option>






                                                                        <option value="593">+593 Ecuador </option>






                                                                        <option value="20">+20 Egypt </option>






                                                                        <option value="503">+503 El Salvador </option>






                                                                        <option value="240">+240 Equatorial Guinea
                                                                        </option>






                                                                        <option value="291">+291 Eritrea </option>






                                                                        <option value="372">+372 Estonia </option>






                                                                        <option value="251">+251 Ethiopia </option>






                                                                        <option value="500">+500 Falkland Islands (Islas
                                                                            Malvinas) </option>






                                                                        <option value="298">+298 Faroe Islands </option>






                                                                        <option value="679">+679 Fiji </option>






                                                                        <option value="358">+358 Finland </option>






                                                                        <option value="33">+33 France </option>






                                                                        <option value="594">+594 French Guiana </option>






                                                                        <option value="689">+689 French Polynesia
                                                                        </option>






                                                                        <option value="241">+241 Gabon </option>






                                                                        <option value="995">+995 Georgia </option>






                                                                        <option value="49">+49 Germany </option>






                                                                        <option value="233">+233 Ghana </option>






                                                                        <option value="350">+350 Gibraltar </option>






                                                                        <option value="30">+30 Greece </option>






                                                                        <option value="299">+299 Greenland </option>






                                                                        <option value="1473">+1473 Grenada </option>






                                                                        <option value="590">+590 Guadeloupe </option>






                                                                        <option value="1671">+1671 Guam </option>






                                                                        <option value="502">+502 Guatemala </option>






                                                                        <option value="44">+44 Guernsey </option>






                                                                        <option value="224">+224 Guinea </option>






                                                                        <option value="245">+245 Guinea-Bissau </option>






                                                                        <option value="592">+592 Guyana </option>






                                                                        <option value="509">+509 Haiti </option>






                                                                        <option value="504">+504 Honduras </option>






                                                                        <option value="852">+852 Hong Kong </option>






                                                                        <option value="36">+36 Hungary </option>






                                                                        <option value="354">+354 Iceland </option>






                                                                        <option value="91">+91 India </option>






                                                                        <option value="62">+62 Indonesia </option>






                                                                        <option value="98">+98 Iran </option>






                                                                        <option value="964">+964 Iraq </option>






                                                                        <option value="353">+353 Ireland </option>






                                                                        <option value="44">+44 Isle of Man </option>






                                                                        <option value="972">+972 Israel </option>






                                                                        <option value="39">+39 Italy </option>






                                                                        <option value="1876">+1876 Jamaica </option>






                                                                        <option value="81">+81 Japan </option>






                                                                        <option value="44">+44 Jersey </option>






                                                                        <option value="962">+962 Jordan </option>






                                                                        <option value="7">+7 Kazakhstan </option>






                                                                        <option value="254">+254 Kenya </option>






                                                                        <option value="686">+686 Kiribati </option>






                                                                        <option value="383">+383 Kosovo </option>






                                                                        <option value="965">+965 Kuwait </option>






                                                                        <option value="996">+996 Kyrgyz Republic
                                                                        </option>






                                                                        <option value="856">+856 Lao PDR </option>






                                                                        <option value="371">+371 Latvia </option>






                                                                        <option value="961">+961 Lebanon </option>






                                                                        <option value="266">+266 Lesotho </option>






                                                                        <option value="231">+231 Liberia </option>






                                                                        <option value="218">+218 Libya </option>






                                                                        <option value="423">+423 Liechtenstein </option>






                                                                        <option value="370">+370 Lithuania </option>






                                                                        <option value="352">+352 Luxembourg </option>






                                                                        <option value="853">+853 Macau </option>






                                                                        <option value="389">+389 Macedonia </option>






                                                                        <option value="261">+261 Madagascar </option>






                                                                        <option value="265">+265 Malawi </option>






                                                                        <option value="60">+60 Malaysia </option>






                                                                        <option value="960">+960 Maldives </option>






                                                                        <option value="223">+223 Mali </option>






                                                                        <option value="356">+356 Malta </option>






                                                                        <option value="692">+692 Marshall Islands
                                                                        </option>






                                                                        <option value="596">+596 Martinique </option>






                                                                        <option value="222">+222 Mauritania </option>






                                                                        <option value="230">+230 Mauritius </option>






                                                                        <option value="262">+262 Mayotte </option>






                                                                        <option value="52">+52 Mexico </option>






                                                                        <option value="691">+691 Micronesia </option>






                                                                        <option value="373">+373 Moldova </option>






                                                                        <option value="377">+377 Monaco </option>






                                                                        <option value="976">+976 Mongolia </option>






                                                                        <option value="382">+382 Montenegro </option>






                                                                        <option value="212">+212 Morocco </option>






                                                                        <option value="258">+258 Mozambique </option>






                                                                        <option value="95">+95 Myanmar </option>






                                                                        <option value="264">+264 Namibia </option>






                                                                        <option value="674">+674 Nauru </option>






                                                                        <option value="977">+977 Nepal </option>






                                                                        <option value="31">+31 Netherlands </option>






                                                                        <option value="687">+687 New Caledonia </option>






                                                                        <option value="64">+64 New Zealand </option>






                                                                        <option value="505">+505 Nicaragua </option>






                                                                        <option value="227">+227 Niger </option>






                                                                        <option value="234">+234 Nigeria </option>






                                                                        <option value="850">+850 North Korea </option>






                                                                        <option value="1670">+1670 Northern Mariana
                                                                            Islands </option>






                                                                        <option value="47">+47 Norway </option>






                                                                        <option value="968">+968 Oman </option>






                                                                        <option value="92">+92 Pakistan </option>






                                                                        <option value="680">+680 Palau </option>






                                                                        <option value="970">+970 Palestine </option>






                                                                        <option value="507">+507 Panama </option>






                                                                        <option value="675">+675 Papua New Guinea
                                                                        </option>






                                                                        <option value="595">+595 Paraguay </option>






                                                                        <option value="51">+51 Peru </option>






                                                                        <option value="63">+63 Philippines </option>






                                                                        <option value="48">+48 Poland </option>






                                                                        <option value="351">+351 Portugal </option>






                                                                        <option value="1">+1 Puerto Rico </option>






                                                                        <option value="974">+974 Qatar </option>






                                                                        <option value="262">+262 Reunion </option>






                                                                        <option value="40">+40 Romania </option>






                                                                        <option value="7">+7 Russian Federation
                                                                        </option>






                                                                        <option value="250">+250 Rwanda </option>






                                                                        <option value="590">+590 Saint Barthélemy
                                                                        </option>






                                                                        <option value="290">+290 Saint Helena, Ascension
                                                                            and Tristan da Cunha </option>






                                                                        <option value="508">+508 Saint Pierre and
                                                                            Miquelon </option>






                                                                        <option value="685">+685 Samoa </option>






                                                                        <option value="378">+378 San Marino </option>






                                                                        <option value="239">+239 Sao Tome and Principe
                                                                        </option>






                                                                        <option value="966">+966 Saudi Arabia </option>






                                                                        <option value="221">+221 Senegal </option>






                                                                        <option value="381">+381 Serbia </option>






                                                                        <option value="248">+248 Seychelles </option>






                                                                        <option value="232">+232 Sierra Leone </option>






                                                                        <option value="65">+65 Singapore </option>






                                                                        <option value="1721">+1721 Sint Maarten (Dutch
                                                                            part) </option>






                                                                        <option value="421">+421 Slovakia </option>






                                                                        <option value="386">+386 Slovenia </option>






                                                                        <option value="677">+677 Solomon Islands
                                                                        </option>






                                                                        <option value="252">+252 Somalia </option>






                                                                        <option value="27">+27 South Africa </option>






                                                                        <option value="82">+82 South Korea </option>






                                                                        <option value="211">+211 South Sudan </option>






                                                                        <option value="34">+34 Spain </option>






                                                                        <option value="94">+94 Sri Lanka </option>






                                                                        <option value="1869">+1869 St. Kitts and Nevis
                                                                        </option>






                                                                        <option value="1758">+1758 St. Lucia </option>






                                                                        <option value="590">+590 St. Martin (French
                                                                            part) </option>






                                                                        <option value="1784">+1784 St. Vincent and the
                                                                            Grenadines </option>






                                                                        <option value="249">+249 Sudan </option>






                                                                        <option value="597">+597 Suriname </option>






                                                                        <option value="268">+268 Swaziland </option>






                                                                        <option value="46">+46 Sweden </option>






                                                                        <option value="41">+41 Switzerland </option>






                                                                        <option value="963">+963 Syrian Arab Republic
                                                                        </option>






                                                                        <option value="886">+886 Taiwan </option>






                                                                        <option value="992">+992 Tajikistan </option>
                                                                        <option value="255">+255 Tanzania </option>
                                                                        <option value="66">+66 Thailand </option>
                                                                        <option value="1242">+1242 The Bahamas </option>
                                                                        <option value="220">+220 The Gambia </option>
                                                                        <option value="670">+670 Timor-Leste </option>
                                                                        <option value="228">+228 Togo </option>
                                                                        <option value="690">+690 Tokelau </option>
                                                                        <option value="676">+676 Tonga </option>
                                                                        <option value="1868">+1868 Trinidad and Tobago
                                                                        </option>
                                                                        <option value="216">+216 Tunisia </option>
                                                                        <option value="90">+90 Turkey </option>
                                                                        <option value="993">+993 Turkmenistan </option>
                                                                        <option value="1649">+1649 Turks and Caicos
                                                                            Islands </option>
                                                                        <option value="688">+688 Tuvalu </option>
                                                                        <option value="256">+256 Uganda </option>
                                                                        <option value="380">+380 Ukraine </option>
                                                                        <option value="971">+971 United Arab Emirates
                                                                        </option>
                                                                        <option value="44">+44 United Kingdom </option>
                                                                        <option value="1">+1 United States </option>
                                                                        <option value="1">+1 United States Minor
                                                                            Outlying Islands </option>
                                                                        <option value="598">+598 Uruguay </option>
                                                                        <option value="998">+998 Uzbekistan </option>
                                                                        <option value="678">+678 Vanuatu </option>
                                                                        <option value="379">+379 Vatican City </option>
                                                                        <option value="58">+58 Venezuela </option>
                                                                        <option value="84">+84 Vietnam </option>
                                                                        <option value="1284">+1284 Virgin Islands (U.S.)
                                                                        </option>
                                                                        <option value="681">+681 Wallis and Futuna
                                                                        </option>
                                                                        <option value="212">+212 Western Sahara
                                                                        </option>
                                                                        <option value="967">+967 Yemen, Rep. </option>
                                                                        <option value="260">+260 Zambia </option>
                                                                        <option value="263">+263 Zimbabwe </option>

                                                                    </select>
                                                                    <span
                                                                        class="select2 select2-container select2-container--default"
                                                                        dir="ltr" style="width: 150px;">
                                                                        <span class="selection">
                                                                            <span
                                                                                class="select2-selection select2-selection--single"
                                                                                role="combobox" aria-haspopup="true"
                                                                                aria-expanded="false" tabindex="-1"
                                                                                aria-labelledby="select2-phoneCode-container">
                                                                                <span
                                                                                    class="select2-selection__rendered"
                                                                                    id="select2-phoneCode-container">
                                                                                    {{-- <span
                                                                                        class="select2-selection__placeholder">
                                                                                        Code
                                                                                    </span> --}}
                                                                                </span>
                                                                                <span class="select2-selection__arrow"
                                                                                    role="presentation">
                                                                                    <b role="presentation"></b>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="dropdown-wrapper"
                                                                            aria-hidden="true">
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="phoneDivAfterPhoneCode">
                                                                <input name="contactNo" id="contactNo" maxlength="15"
                                                                    type="text"
                                                                    class="form-control col-sm-8-- numbers-only"
                                                                    value="" placeholder="Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="otherContact" id="txtMsgDiv" style="display: none;"
                                                    data-showorder="44">
                                                    <div class=" margin-top-20">
                                                        <label>Message </label>
                                                        <label class="input">
                                                            <textarea rows="8" name="message" id="message"
                                                                class="form-control" style="resize: none;"></textarea>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div id="btnDiv" class="otherContact" style="display: none;"
                                                    data-showorder="44">
                                                    <p>
                                                        <button type="submit" class="btn-u" id="btnSendMsg">Send
                                                            message</button>

                                                    </p>
                                                    <img id="imageLoader" style="display: none;"
                                                        src="/resources/assets/img/customImages/load.gif">
                                                </div>

                                            </div>
                                            <div class="message">
                                                <i class="rounded-x fas fa-check"></i>
                                                <p>Your message was successfully sent!</p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:200px; margin-bottom:50px; display:none;"><i
                                    class="fas fa-map-marker-alt large" style="font-size:130%;"></i> 2044 Sunrise Cir,
                                Aurora, IL, USA 60503</div>
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('include-js')
{{-- <script src="https://assets2.teacheron.com/resources/assets/js/forms/contact.js"></script> --}}
<script type="text/javascript">
    var showOrder=1;
    var selectVisibleCount = 0;
    $('.openSelectedAndHideOtherChild').change(function(){
        var options = $("#"+this.id+' option');
        var parentShowOrder = $("#"+this.id).closest('*[data-showOrder]').attr('data-showOrder');

        var values = $.map(options ,function(option) {
            $(option.value).hide();
        });
        $('*[data-showOrder]').each( function() {
            $showOrder = $(this).attr('data-showOrder');
            console.log("$showOrder",$showOrder,"parentShowOrder",parentShowOrder)
            if($showOrder>parentShowOrder){
                $(this).hide();
                $(this).find('select.openSelectedAndHideOtherChild').val("");
            }
        });
        $(this.value).slideDown().attr('data-showOrder', showOrder++);

        if($("#otherContact").is(":visible") || $('body').find(".openSelectedAndHideOtherChild:visible:last").val()==""){
            $("#stillNeedHelp").hide();
            $("#otherContact, .otherContact").attr('data-showOrder', showOrder++);
        }
        else
            $("#stillNeedHelp").show();

    });

    jQuery(document).ready(function() {
          $('.btnSendToChatbot').on('click', function(){
            $("#chat-input").val($("#message").val());
            // console.log($("#chat-input").val());
            send_message();
            openChatWindow();
            return false;
        });
        // ContactForm.initContactForm();
        // initSelect2Msg();
        // if(contactKeyFound=='true'){
        //     $('#hideMeWhenContactKeyFoundDiv').hide();
        //     $('#showMeWhenContactKeyFoundDiv').show();
        // } else {
        //     $('#hideMeWhenContactKeyFoundDiv').show();
        //     $('#showMeWhenContactKeyFoundDiv').hide();
        // }

        $('#stillNeedHelp').on('click', function(){
            $("#otherContact").show();
            $(".otherContact").show();
        });
    });



    function showContactusForm(){
        $("#contactUsForm").show();
        if(contactKeyFound=='true'){
            $('#hideMeWhenContactKeyFoundDiv').hide();
        } else {
            $('#hideMeWhenContactKeyFoundDiv').show();
        }

        // In some cases user have name and email only and dont have phone number
        if(showUserNameDiv=='true'){
            $('#showMeWhenContactKeyFoundDiv').show();
        } else {
            $('#showMeWhenContactKeyFoundDiv').hide();
        }
        $(".openSelectedAndHideOtherChild").val("");

    };


</script>
@endpush
@section('footer')
@include('includes.footer')
@stop
