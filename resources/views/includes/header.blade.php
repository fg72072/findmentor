<!-- Navbar Code Start -->
<section>
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
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-th navIcons"></i>
                        <a class="nav-links" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-th navIcons"></i>
                        <a class="nav-links" href="{{ route('job_messages') }}">Messages</a>
                    </li>
                    @endhasanyrole

                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-book-open navIcons"></i>
                        <a class="nav-links" href="{{ route('findtutor') }}">Courses</a>
                    </li>
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-book-open navIcons"></i>
                        <a class="nav-links" href="{{ route('tutor_job') }}">Find Tutor Jobs</a>
                    </li>

                    @hasanyrole('teacher|student')
                    <li class="nav-item ml-4 mt-2">
                        <i class="fas fa-comment-dots navIcons"></i>
                        <a class="nav-links" href="{{ route('buyCoin') }}">Wallet</a>
                    </li>
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
                            <a class="dropdown-item" href="{{route('setting')}}">Setting</a>
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
