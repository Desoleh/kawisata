<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config($title) }}</title>

    {{-- @include('includes.script-top')

    @stack('before-style')
    @include('includes.style')
    @stack('after-style') --}}

    @yield('style')
</head>
<body>
    <div id="app">
        @include('layouts.includes.navbarm')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('script')
    @stack('after-script')
</body>
</html>
