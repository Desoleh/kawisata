<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.includes.meta')
  <title>@yield('title')</title>
    @stack('before-style')
    @include('layouts.admin.includes.style')
    @stack('after-style')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">

        @include('layouts.admin.includes.header')

        @include('layouts.admin.includes.navbar')

        @include('layouts.admin.includes.mainsidebar')

        @yield('content')
        {{-- @include('layouts.admin.includes.content') --}}

        @include('layouts.admin.includes.footer')

        @include('layouts.admin.includes.sidebarcontrol')
    </div>
    <!-- ./wrapper -->

        @stack('before-script')

        @include('layouts.admin.includes.script')

        @stack('after-script')

</body>
</html>
