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

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="{{asset('images/logo.png')}}" alt="" height=60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/user">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/profile">Profil Pegawai</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/salary">Penghasilan</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/peraturan">Peraturan Perusahaan</a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu mr-auto" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    </li>
                </ul>

            </div>

        </div>
    </nav>

    {{-- sidebar --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="flex-shrink-0 p-3 bg-light-gray" style="width: 250px;">
                    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-5 fw-semibold">Collapsible</span>
                    </a>
                    <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        Home
                        </button>
                        <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Overview</a></li>
                            <li><a href="#" class="link-dark rounded">Updates</a></li>
                            <li><a href="#" class="link-dark rounded">Reports</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Dashboard
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Overview</a></li>
                            <li><a href="#" class="link-dark rounded">Weekly</a></li>
                            <li><a href="#" class="link-dark rounded">Monthly</a></li>
                            <li><a href="#" class="link-dark rounded">Annually</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        Orders
                        </button>
                        <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">New</a></li>
                            <li><a href="#" class="link-dark rounded">Processed</a></li>
                            <li><a href="#" class="link-dark rounded">Shipped</a></li>
                            <li><a href="#" class="link-dark rounded">Returned</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="border-top my-3"></li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                        </button>
                        <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">New...</a></li>
                            <li><a href="#" class="link-dark rounded">Profile</a></li>
                            <li><a href="#" class="link-dark rounded">Settings</a></li>
                            <li><a href="#" class="link-dark rounded">Sign out</a></li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="col-10">
                <p>MD-9</p>
                @yield('content')
            </div>
        </div>
    </div>
    {{-- /sidebar --}}


    <!-- Option 1: Bootstrap Bundle with Popper -->

        @stack('before-script')

        @include('layouts.includes.script')

        @stack('after-script')

  </body>
</html>
