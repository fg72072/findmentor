<!-- Navbar Code Start -->

<section>
    @role('teacher')
    @if (isset($is_verified))
    @if (!$is_verified->email_verified_at || !$is_verified->is_account_verified_at)
    <div id="top-alert" class="alert alert-danger mb-0" role="alert">
        @if (!$is_verified->email_verified_at)
        <strong>Email Verification!</strong>
        Before proceeding, please check your email for a verification link. If you did not receive the email,
        <form class="d-inline" method="POST" action="{{route('verification.resend')}}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
        </form>
        @elseif (!$is_verified->is_account_verified_at)
        <strong>Account Verification!</strong>
        Before proceeding, please wait until your account verified
        @if ($is_verified->is_verification_detail_complete == 0)
        <a style="color: #007bff" href="{{route('account')}}">Please
            Verify
        </a>
        @endif
        @endif
    </div>
    @endif
    @endif
    @endrole
    <nav class="navbar navbar-expand-lg shadow pr-0 pl-0">
        <div class="container-fluid ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('asset/images/logo.png') }}" alt="" class="pl-5">
                <span style="margin-left: -15px;">utor</span>
            </a>

            <button class="navbar-toggler mr-5" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 pr-5">
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-home navIcons"></i>
                        <a class="nav-links" href="./">Home</a>
                    </li>
                    @hasanyrole('teacher|student')
                    @if (isset($is_verified))
                    @if (@$is_verified->email_verified_at && @$is_verified->is_account_verified_at)
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-th navIcons"></i>
                        <a class="nav-links" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-comment-dots navIcons"></i>
                        <a class="nav-links" href="{{ route('job_messages') }}">Messages</a>
                        <span id="message_notification"></span>
                    </li>
                    @endif
                    @endif
                    @endhasanyrole

                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-book-open navIcons"></i>
                        <a class="nav-links" href="{{ route('findtutor') }}">Courses</a>
                    </li>
                    @role('super-admin')
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-th navIcons"></i>
                        <a class="nav-links" href="{{ route('admin_dashboard') }}">Dashboard</a>
                    </li>
                    @endrole
                    @role('teacher')
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-search-location navIcons"></i>
                        <a class="nav-links" href="{{ route('tutor_job') }}">Find Tutor Jobs</a>
                    </li>
                    @endrole

                    @hasanyrole('teacher|student')
                    @if (isset($is_verified))
                    @if ($is_verified->email_verified_at && $is_verified->is_account_verified_at)
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-wallet navIcons"></i>
                        <a class="nav-links" href="{{ route('buyCoin') }}">Wallet</a>
                    </li>
                    @endif
                    @endif
                    @endhasanyrole

                    @role('student')
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-search navIcons"></i>
                        <a class="nav-links" href="{{ route('student.requirement') }}">Requirements</a>
                    </li>
                    <a style="background-color: #5cb100;color: white !important;margin-left: 10px;"
                        class="btn nav-links requestBtn" href="{{ route('student.request') }}">Request Tutor</a>
                    @endrole
                    <li class="nav-item dropdown  ml-4">
                        <a class="nav-link " href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user-circle Account"></i>
                            {{-- @if(Auth::user()){{ Auth::user()->name }}({{Auth::user()->getRoleNames()[0]}}) @endif
                            --}}
                            @if(Auth::user()){{ Auth::user()->name }} @endif
                        </a>
                        <div class="dropdown-menu LoginpopUp">
                            @if(Auth::user())
                            <a class="dropdown-item" href="javascript:void"
                                onclick="$('#logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @if (isset($is_verified))
                            @if ($is_verified->email_verified_at && $is_verified->is_account_verified_at)
                            <a class="dropdown-item" href="{{route('setting')}}">Setting</a>
                            @endif
                            @endif
                            @else
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#">Sign In</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#">Sign Up</a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
<!-- Navbar Code End -->
