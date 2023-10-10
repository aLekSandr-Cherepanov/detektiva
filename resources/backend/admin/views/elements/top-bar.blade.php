<div class="topbar-main">
    <div class="container-fluid">

        <!-- Logo container-->
        <div class="logo">
            <a href="{{ route('backend.dashboard') }}" class="logo">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22" class="logo-small">
                <img src="{{ asset('backend/assets/images/logo.png') }}" alt="" height="24" class="logo-large">
            </a>
        </div>

        <div class="menu-extras topbar-custom">
            <!-- Search input -->
            <div class="search-wrap" id="search-wrap">
                <div class="search-bar">
                    <input class="search-input" type="search" placeholder="Search">
                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                        <i class="mdi mdi-close-circle"></i>
                    </a>
                </div>
            </div>

            <ul class="list-inline float-right mb-0">
                <!-- Search -->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                        <i class="mdi mdi-magnify noti-icon"></i>
                    </a>
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link arrow-none waves-effect" href="{{ url('/') }}" title="@lang('backend.go_to_site')" target="_blank">
                        <i class="mdi mdi-home noti-icon"></i>
                    </a>
                </li>
                <!-- User-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('backend/assets/images/user.png') }}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('backend.logout') }}"><i class="dripicons-exit text-muted"></i> @lang('auth.log_out')</a>
                    </div>
                </li>
                <li class="menu-item list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

            </ul>
        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

    </div> <!-- end container -->
</div>
<!-- end topbar-main -->