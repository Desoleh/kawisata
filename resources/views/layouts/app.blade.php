<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>@yield('title')</title>
        <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        @stack('style-before')
        <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
        <script src="https://kit.fontawesome.com/8e44ec7106.js" crossorigin="anonymous"></script>
        @stack('style')
        {!! htmlScriptTagJsApi([
            'action' => 'homepage',
            'custom_validation' => 'myCustomValidation'
        ]) !!}
</head>
<body>
    @include('layouts.includes.navbarm')
    <div id="content" class="content" style="margin-top: 95px">
                @yield('content')
    </div>

    @stack('script-before')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    @stack('script-after')
</body>
</html>
