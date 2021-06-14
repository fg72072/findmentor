<!-- Navbar Code Start -->

<section>
    @role('teacher')
    @if (!$is_verified->email_verified_at || !$is_verified->is_account_verified_at)
    <div id="top-alert" class="alert alert-danger" role="alert">
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
        @endif
    </div>
    @endif
    @endrole
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <img src="{{ asset('asset/images/logo.png') }}" alt="" class="pl-5">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 pr-5">
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-home navIcons"></i>
                        <a class="nav-links" href="./">Home</a>
                    </li>
                    @hasanyrole('teacher|student')
                    @if ($is_verified->email_verified_at && $is_verified->is_account_verified_at)
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-th navIcons"></i>
                        <a class="nav-links" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-th navIcons"></i>
                        <a class="nav-links" href="{{ route('job_messages') }}">Messages</a>
                        <span id="message_notification"></span>
                    </li>
                    @endif
                    @endhasanyrole

                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-book-open navIcons"></i>
                        <a class="nav-links" href="{{ route('findtutor') }}">Courses</a>
                    </li>

                    @role('teacher')
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-book-open navIcons"></i>
                        <a class="nav-links" href="{{ route('tutor_job') }}">Find Tutor Jobs</a>
                    </li>
                    @endrole

                    @hasanyrole('teacher|student')
                    @if ($is_verified->email_verified_at && $is_verified->is_account_verified_at)
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-comment-dots navIcons"></i>
                        <a class="nav-links" href="{{ route('buyCoin') }}">Wallet</a>
                    </li>
                    @endif
                    @endhasanyrole

                    @role('student')
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-search navIcons"></i>
                        <a class="nav-links" href="{{ route('student.requirement') }}">Requirements</a>
                    </li>
                    <a class="btn  nav-links" href="{{ route('student.request') }}">Request Tutor</a>
                    @endrole

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user-circle Account"></i>
                            @if(Auth::user()){{ Auth::user()->name }}({{Auth::user()->getRoleNames()}}) @endif
                        </a>
                        <div class="dropdown-menu LoginpopUp">
                            @if(Auth::user())
                            <a class="dropdown-item" href="javascript:void"
                                onclick="$('#logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @if ($is_verified->email_verified_at && $is_verified->is_account_verified_at)
                            <a class="dropdown-item" href="{{route('setting')}}">Setting</a>
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
