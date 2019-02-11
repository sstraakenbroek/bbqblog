<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('page.title', config('app.name'))</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
@include('layout.menu')
@include('layout.header')
@include('layout.alert')
@yield('content')
@include('layout.footer')
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>