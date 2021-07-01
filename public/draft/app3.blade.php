<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>@yield('title')</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

        @stack('before-style')

        @include('layouts.includes.style')

        @stack('after-style')

    <title>@yield('title')</title>
  </head>
  <body>


        @yield('content')

    <!-- Option 1: Bootstrap Bundle with Popper -->

        @stack('before-script')

        @include('layouts.includes.script')

        @stack('after-script')

  </body>
</html>
