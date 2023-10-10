<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title_prefix', config('backend.title_prefix', ''))@yield('title', config('backend.title', 'Login'))@yield('title_postfix', config('backend.title_postfix', ''))</title>
    <meta content="Login to the Admin Panel VT2 CMS" name="description"/>
    <meta content="VT2" name="author"/>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}" type="image/x-icon"/>
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
    @yield('styles')
</head>
<body>
@yield('content')

<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/waves.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

@yield('scripts')
</body>
</html>
