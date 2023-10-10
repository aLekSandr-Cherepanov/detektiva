<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title'){{ config('app.name', '') }}</title>
    <meta name="generator" content="VT2 CMS"/>
    <link rel="canonical" href=""/>
    <link rel='shortlink' href=''/>

    <link rel="icon" href="{{ asset('images/icons/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/icons/favicon-150x150.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('images/icons/favicon-230x230.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon" href="{{ asset('images/icons/favicon-230x230.png') }}"/>
    <meta name="msapplication-TileImage" content="{{ asset('images/icons/favicon-230x230.png') }}"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Slab:700%7CPlayfair+Display:400,700,700i%7CLato:300%7CMontserrat:300,400,500,600">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('styles')
<!-- Global site tag (gtag.js) - Google Analytics -->
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=XXXXX"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'XXXXX');--}}
{{--    </script>--}}
{{--    <script data-ad-client="ca-pub-0000000" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>--}}
</head>
<body>
@yield('content')

<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('scripts')

</body>
</html>