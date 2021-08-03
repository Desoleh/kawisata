<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>@yield('title')</title>
        <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">


        @stack('before-style')
        @include('layouts.includes.style-m')
        @stack('after-style')

</head>
<body>
    @include('layouts.includes.navbarm')
    <div>
                @yield('content')
    </div>
    @include('layouts.includes.script-bottom')
    @stack('after-scrpt')

</body>
</html>
