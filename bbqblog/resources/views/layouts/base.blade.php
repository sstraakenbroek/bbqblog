<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('page.title', config('app.name'))</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
@include('layouts.menu')
@include('layouts.header')
@include('layouts.alert')
@yield('content')
@include('layouts.footer')
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>