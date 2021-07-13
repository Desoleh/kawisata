<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>@yield('title')</title>

        @stack('before-style')
        @include('layouts.includes.style-m')
        @stack('after-style')

    <title>@yield('title')</title>
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
