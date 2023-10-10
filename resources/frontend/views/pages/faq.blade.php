@extends('layouts.app')

@section('title', __('frontend.faq') . ' | ')

@section('content')
    <div class="ie-panel"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>

    @include('elements.preloader')

    <div class="page">
        <!-- Page Header-->
        @include('elements.header_page')

        <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ asset('images/breadcrumbs-bg.jpg') }});">
            <div class="container">
                <h4 class="breadcrumbs-custom-title">@lang('frontend.faq')</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">@lang('frontend.menu.home')</a></li>
                    <li class="active">@lang('frontend.faq')</li>
                </ul>
            </div>
        </section>

        @include('elements.block_faq')

        <a name="form-contact"></a>
        @include('elements.form_contact')

        @include('elements.footer')

    </div>
    <div class="snackbars" id="form-output-global"></div>
    <!-- #page -->
@endsection



