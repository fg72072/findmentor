<!-- Navbar Code Start -->
<section>
    @role('teacher')
    @if (isset($is_verified))
    @if (!$is_verified->email_verified_at || !$is_verified->is_account_verified_at || !$is_verified->active_status)
    <div id="top-alert" class="alert alert-danger mb-0" role="alert">
        @if (!$is_verified->email_verified_at)
        <strong>Email Verification!</strong>
        Before proceeding, please check your email for a verification link. If you did not receive the
        email,
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request
                another</button>.
        </form>
        @elseif (!$is_verified->is_account_verified_at)
        <strong>Account Verification!</strong>
        Before proceeding, please wait until your account verified
        @if ($is_verified->is_verification_detail_complete == 0)
        <a style="color: #007bff" href="{{ route('account') }}">Please
            Verify
        </a>
        @endif
        @elseif (!$is_verified->active_status)
        <strong>Account Blocked!</strong>
        Please Contact Customer Support
        @endif
    </div>
    @endif
    @endif
    @endrole
    <div class="header">
        <!-- header div start.. will end at the end -->
        <div class="container">
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('asset/images/logo.png') }}" alt="" class="pl-5">
                <span style="margin-left: -15px;">utor</span>
            </a>

            <!-- Topbar -->
            <div class="topbar">
                <ul class="loginbar pull-right list-unstyled">
                    <li class="showOnlyInMobile">
                        <button type="button" class="navbar-toggle " id="menuForMobileBtnId" data-toggle="collapse"
                            data-target=".navbar-responsive-collapse" style="clear: both; float:left;">
                            <span class="sr-only">Toggle navigation</span>
                            <img alt="menu"
                                src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjRkZGIiBoZWlnaHQ9IjM2IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIzNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMyAxOGgxOHYtMkgzdjJ6bTAtNWgxOHYtMkgzdjJ6bTAtN3YyaDE4VjZIM3oiLz48L3N2Zz4K"
                                height="20px" width="20px">
                        </button>
                    </li>
                    @if (Auth::user())
                    <li class="showOnlyInMobile">
                        <!-- Inline logo to be shown only in mobile. -->
                        <a class="inlineLogo" href="{{ route('home') }}">
                            <img class="hideBelow400" src="{{ asset('asset/images/logo.png') }}" alt="Logo">
                            <span style="margin-left: -15px;">utor</span>
                            <div style="margin-top: 8px; padding-left: 6px; display:inline-block;">
                                <img class="showBelow400" src="{{ asset('asset/images/logo.png') }}" alt="Logo"
                                    style="height:30px;">
                            </div>
                        </a>
                        <!-- End Toggle -->
                    </li>
                    <li class="floatRightInMobile">
                        <ul class="list-inline- up-ul allChildLinksNormal padding-left-0">
                            <li class="btn-group">
                                <a href="{{ route('job_messages') }}">
                                    <button class="btn btn-default clsStandAloneUnreadMsgStudent" type="button"
                                        style="border:none;padding: 4px 6px 0 6px; margin-right: 10px; /* font-size: 29px; */">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-envelope" width="30"
                                            height="30" viewBox="0 0 128 100">
                                            <path class="foreground" fill="#888"
                                                d="M 65.438456,65.221147 126.86843,26.807809 c 0.70148,-0.500499 1.30276,-1.626623 1.30276,-2.752748 V 12.793822 c 0,-1.000999 -0.70149,-1.876873 -1.50318,-1.876873 H 1.5031805 C 0.70148421,11.042074 0,11.917948 0,12.918948 v 11.261239 c 0,1.000999 0.60127218,2.252247 1.3027564,2.752746 L 62.732731,65.346272 c 0.801696,0.375375 2.00424,0.375375 2.705725,-0.125125 z">
                                            </path>
                                            <path class="foreground" fill="#777"
                                                d="M 62.7,75.387792 1.3,36.876165 c -0.7,-0.50342 -1.3,0 -1.3,1.00684 v 76.771545 c 0,1.00684 0.7,1.88783 1.5,1.88783 h 125 c 0.8,0 1.5,-0.88099 1.5,-1.88783 V 37.883005 c 0,-1.00684 -0.6,-1.51026 -1.3,-1.00684 L 65.3,75.387792 c -0.7,0.503419 -1.9,0.503419 -2.6,0 z">
                                            </path>
                                        </svg>
                                        <span
                                            style="font-size: 10px; margin-left:-16px; margin-top:-34px; background-color:#e74c3c; margin-right: -5px;"
                                            class="badge badge-red rounded-x total-unread-msg-count-badge"></span>
                                        <span class="hidden-xs" style="vertical-align: super;">Messages</span>
                                        <span class="sr-only">Toggle Message Dropdown</span>
                                    </button>
                                </a>
                            </li>

                            <li class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle color-light-grey"
                                    type="button" style="border:none;padding: 1px 0 0 0; /* font-size: 29px; */">
                                    <img src="https://www.teacheron.com/resources/assets/customPlugin/chatbot/images/unknown.jpg"
                                        class=" img-responsive- rounded-x" style="height:34px; width:34px;"
                                        alt="Profile image with menu options"><span
                                        class="hidden-xs margin-right-5 margin-left-5">
                                        @if (Auth::user())
                                        {{ Auth::user()->name }} @endif
                                        <i class="fas fa-angle-down" style="width: 9.68px; display: inline-block;"></i>
                                    </span>
                                    <span class="sr-only">
                                        Toggle Dropdown
                                    </span>
                                </button>
                                <ul role="menu" class="dropdown-menu topbarDropdown">
                                    @if (Auth::user())

                                    <li class="simpleText">
                                        {{ Auth::user()->name }}<br><small>{{ Auth::user()->email }}</small>
                                    </li>
                                    <li>
                                        <hr>
                                    </li>

                                    <li>
                                        <a href="javascript:void" onclick="$('#logout-form').submit();"> <i
                                                class="fas fa-sign-out-alt"></i>
                                            Sign out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    <li>
                                        @if (isset($is_verified))
                                        @if ($is_verified->email_verified_at && $is_verified->is_account_verified_at)
                                        <a href="{{ route('setting') }}">
                                            <i class="fa fa-cog color-dark"></i> Settings
                                        </a>
                                        @endif
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>

                    </li>
                    @else
                    <li class="floatRightInMobile" style="clear: none;margin-top:15px;">
                        <div class="showOnlyInMobile">
                            <div class="">
                                <a class="mr-2"
                                    style="color: #687074; border: 1px solid #687074; padding: 8px 10px 8px 10px;"
                                    data-toggle="modal" data-target="#myModal" href="#">
                                    Login
                                </a>
                                <a style="color: #fff; background-color: #e81c62;/*  margin-left:10px;  */padding: 9px 10px 9px 10px;"
                                    href="">
                                    Request tutor
                                </a>
                            </div>
                        </div>
                    </li>
                    @endif

                </ul>
                <div class="clear-both"></div>
            </div>

            <!-- End Topbar -->

        </div>
        <!--/end container-->

        <!-- ==== TOP BAR RELATED CODE END ==== -->

        <!-- ====MENU RELATED CODE START ==== -->
        <!-- Collect the nav links, forms, and other content for toggling -->

        @if (!Auth::user())
        @php $route = route('findtutor'); @endphp
        @endif

        @role('student')
        @php $route = route('findtutor'); @endphp
        @endrole

        @role('teacher')
        @php $route = route('tutor_job'); @endphp
        @endrole

        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse margin-bottom-10">
            <div class="container margin-bottom-20">
                <ul class="nav navbar-nav">
                    @role('student')
                    <li class="active"><a href="{{ route('student.requirement') }}">My Posts</a></li>
                    @endrole


                    @if (Auth::user())

                    @role('student')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            Find Tutors <i class="fas fa-angle-down " style="width: 9.68px; display: inline-block;"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('findtutor') }}">All Tutors</a></li>
                            <li><a href="{{ route('findtutor') }}?search=online">Online Tutors</a></li>
                            <li><a href="{{ route('findtutor') }}?search=home">Home Tutors</a></li>
                        </ul>
                    </li>
                    @endrole

                    @role('teacher')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            Find Tutor Jobs <i class="fas fa-angle-down " style="width: 9.68px; display: inline-block;"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('tutor_job') }}">All Tutor Jobs</a></li>
                            <li><a href="{{ route('tutor_job') }}?search=online">Online Tutor Jobs</a></li>
                            <li><a href="{{ route('tutor_job') }}?search=home">Home Tutor Jobs</a></li>
                        </ul>
                    </li>
                    @endrole

                    @else
                    <li class="dropdown">
                        <a href="./find-tutor" class="dropdown-toggle" data-toggle="dropdown">
                            Find Tutors <i class="fas fa-angle-down " style="width: 9.68px; display: inline-block;"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ $route }}">All Tutors</a></li>
                            <li><a href="{{ $route }}?search=online">Online Tutors</a></li>
                            <li><a href="{{ $route }}?search=home">Home Tutors</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            Find Tutor Jobs <i class="fas fa-angle-down " style="width: 9.68px; display: inline-block;"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('tutor_job') }}">All Tutor Jobs</a></li>
                            <li><a href="{{ route('tutor_job') }}?search=online">Online Tutor Jobs</a></li>
                            <li><a href="{{ route('tutor_job') }}?search=home">Home Tutor Jobs</a></li>
                        </ul>
                    </li>
                    @endif

                    @if (Auth::user())
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Wallet <i class="fas fa-angle-down " style="width: 9.68px; display: inline-block;"
                                aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('buyCoin') }}">Coin Wallet</a></li>
                            <li><a href="{{ route('buyCoin') }}">Buy Coins</a></li>
                            {{-- <li><a href="https://www.teacheron.com/payments">Payments</a></li> --}}
                            <li><a href="{{ route('invite-friends') }}">Invite friends for coins</a></li>
                            <li><a href="{{ route('refer_and_earn') }}">Refer to get coins</a></li>
                        </ul>
                    </li>
                    @endif

                    @if (!Auth::user())
                    {{-- <li><a href="javascript:void(0)">Assignment help</a></li> --}}
                    @endif

                    @if (Auth::user())
                    <li><a href="{{ route('review') }}">Reviews</a></li>

                    @role('student')
                    <li><a class="goPremiumMenuLink" href="{{ route('student.request') }}">Post Requirement</a>
                    </li>
                    @endrole

                    @else

                    <li class="">
                        <a style="border: 1px solid #16a085;padding: 8px 15px 8px 15px" data-toggle="modal"
                            data-target="#myModal" href="#">
                            Sign In
                        </a>
                    </li>
                    <li><a class="goPremiumMenuLink" href="{{ route('student.request') }}">Request a
                            Tutor</a></li>
                    @endif
                </ul>
            </div>
            <!--/end container-->
        </div>
        <!--/navbar-collapse-->
        <!-- ====MENU RELATED CODE END ==== -->
    </div>
</section>
