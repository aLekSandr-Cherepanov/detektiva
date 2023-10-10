<header id="topnav">
@include('views.elements.top-bar')

<!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('backend.dashboard') }}"><i class="ti-home"></i>@lang('backend.menu.dashboard')</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-files"></i>@lang('backend.menu.pages')</a>
                        <ul class="submenu">
                            <li><a href="{{ route('backend.pages.index') }}">@lang('backend.menu.pages')</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-files"></i>@lang('backend.menu.blocks')</a>
                        <ul class="submenu">
                            <li><a href="{{ route('backend.blocks.faq.index') }}">@lang('backend.menu.faq')</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-user"></i>@lang('backend.menu.admins')</a>
                        <ul class="submenu">
                            <li><a href="{{ route('backend.admins.index') }}">@lang('backend.menu.admins')</a></li>
                            <li><a href="{{ route('backend.roles.index') }}">@lang('backend.menu.roles')</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</header>

