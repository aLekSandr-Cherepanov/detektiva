<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>@lang('mails.email_title') {{ $name }}!</h2>
<div>
    <p>@lang('mails.reset_intro')</p>
    <p>@lang('mails.reset_label_link'): <a href="{{ route('backend.password.reset', ['token' => $token]) }}" target="_blank">
            {{ route('backend.password.reset', ['token' => $token]) }}
        </a></p>
    <p>@lang('mails.reset_label_url')</p>
</div>
--
<div>
    <p>@lang('mails.email_signature'),<br>{{ config('app.name') }}</p>
    <p></p>
</div>
</body>


