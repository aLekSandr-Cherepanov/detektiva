<header class="section page-header header-transparent">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
             data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
             data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer rd-navbar-collapse bg-secondary">
                <div class="rd-navbar-aside">
                    <ul class="list-inline list-inline-md">
                        <li>
                            <div class="unit unit-spacing-xs align-items-center">
                                <div class="unit-left"><span class="icon text-middle fa-phone"></span></div>
                                <div class="unit-body"><a href="tel:+4917611070707">+4917611070707</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-xs align-items-center">
                                <div class="unit-left"><span class="icon text-middle fa-envelope"></span></div>
                                <div class="unit-body"><a href="mailto:info@detektiva.com">info@detektiva.com</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-xs align-items-center">
                                <div class="unit-left"><span class="icon text-middle fa-map-marker"></span></div>
                                <div class="unit-body">Германия, Нюрнберг, Лоренцер штрассе 11</div>
                            </div>
                        </li>
                    </ul>

                    <ul class="rd-navbar-soc list-inline list-inline-sm">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if($localeCode == LaravelLocalization::getCurrentLocale())
                                <li class="list-inline-item flag-top">
                                    <img src="{{ asset('images/flags/' . $localeCode . '.png') }}" alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}" width="22" height="16">
                                    </a>
                                </li>
                            @else
                                <li class="list-inline-item flag-top">
                                    <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <img src="{{ asset('images/flags/' . $localeCode . '.png') }}" alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}" width="22" height="16"
                                             class="flag-activate">
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li class="list-inline-item">&nbsp;</li>
                        @include('elements.block_networks_icons')

                    </ul>
                </div>
            </div>
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <a class="brand" href="/">
                                <img class="brand-logo-dark" src="{{ asset('images/logo.png') }}" alt="" width="159" height="40" srcset="{{ asset('images/logo-big.png 2x') }}"/>
                            </a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active">
                                    <a class="rd-nav-link" href="/">@lang('frontend.menu.home')</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/detektiv-berlin-detektivnoe-agenstvo-germania-privat">@lang('frontend.menu.individuals')</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/detektiv-berlin-detektivnoe-agenstvo-germania-jura">@lang('frontend.menu.legal')</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/uslugi-detektiva-berlin-info">@lang('frontend.menu.investigations')</a>
                                </li>
                            </ul>
                        </div>
                        <!-- RD Navbar Search-->
                        <div class="rd-navbar-search">

                            <ul class="rd-navbar-search-toggle rd-navbar-fixed-element-3">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if($localeCode == LaravelLocalization::getCurrentLocale())
                                        <li class="flag">
                                            <img src="{{ asset('images/flags/' . $localeCode . '.png') }}" alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}" width="22" height="16">
                                            </a>
                                        </li>
                                    @else
                                        <li class="flag">
                                            <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                <img src="{{ asset('images/flags/' . $localeCode . '.png') }}" alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}" width="22" height="16"
                                                     class="flag-activate">
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                            <button class="rd-navbar-search-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                            <form class="rd-search" action="/search" data-search-live="rd-search-results-live" method="GET">
                                <div class="form-wrap">
                                    <label class="form-label" for="rd-navbar-search-form-input">Search</label>
                                    <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                                    <div class="rd-search-results-live" id="rd-search-results-live"></div>
                                </div>
                                <button class="rd-search-form-submit fa-search" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>