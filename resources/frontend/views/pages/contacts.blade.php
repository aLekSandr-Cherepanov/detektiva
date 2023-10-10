@extends('layouts.app')

@section('title', __('frontend.contacts.contacts') . ' | ')

@section('content')
    <div class="ie-panel"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820"
                                                                                                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>

    @include('elements.preloader')

    <div class="page">
        <!-- Page Header-->
        @include('elements.header_page')

        <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ asset('images/breadcrumbs-bg.jpg') }});">
            <div class="container">
                <h4 class="breadcrumbs-custom-title">@lang('frontend.contacts.contacts')</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">@lang('frontend.menu.home')</a></li>
                    <li class="active">@lang('frontend.contacts.contacts')</li>
                </ul>
            </div>
        </section>

        <section class="bg-default section-md section-relative">
            <div class="container">
                <div class="row row-50 justify-content-xl-between">
                    <div class="col-lg-9 col-xl-8">
                        <div class="section-title section-title-left">
                            <h3 class="text-capitalize">@lang('frontend.contacts.contacts')</h3>
                        </div>

{{--                        {!! $page->content !!}--}}

                    </div>
                    <div class="col-lg-3 pt-lg-5">
                        <div class="block-aside">
                            <div class="block-aside-item">
                                <!-- RD Search-->
                                <form class="rd-search" action="https://livedemo00.template-help.com/wt_prod-20957/search-results.html" method="GET">
                                    <div class="form-wrap">
                                        <label class="form-label" for="rd-search-form-input">Search</label>
                                        <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
                                        <button class="rd-search-form-submit fa-search" type="submit"></button>
                                    </div>
                                </form>
                            </div>

{{--                            @include('elements.block_services_individuals')--}}

{{--                            @include('elements.block_services_legal')--}}

                            @include('elements.block_helpful_info')

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <a name="form-contact"></a>
        @include('elements.form_contact')

        @include('elements.footer')

    </div>
    <div class="snackbars" id="form-output-global"></div>
    <!-- #page -->
@endsection



