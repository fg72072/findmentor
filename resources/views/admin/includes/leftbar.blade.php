<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{route('admin_dashboard')}}">
                <img class="img-fluid for-light" src="{{ asset('asset/images/logo.png') }}" alt="">
                <img class="img-fluid for-dark" src="{{ asset('asset/images/logo.png') }}" alt="">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{route('admin_dashboard')}}">
                <img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{route('admin_dashboard')}}">
                            <img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt="">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav active" href="{{route('admin_dashboard')}}">
                            <i data-feather="home"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('admin_users')}}">
                            <i data-feather="user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('admin_account_verify')}}">
                            <i data-feather="user-check"></i>
                            <span>Account Verify</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('admin_coins')}}">
                            <i data-feather="stop-circle"></i>
                            <span>Coins</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('admin_request')}}">
                            <i data-feather="book-open"></i>
                            <span>Requirements</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('admin_setting')}}">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </a>
                    </li>

            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
