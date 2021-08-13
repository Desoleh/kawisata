<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <title>eoffice KA Pariwisata</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .lead1 {
      font-size: x-large;
      font-weight:bold;
      margin-bottom: 0;
      }
    </style>
  </head>
  <body>

<main>
  <h1 class="visually-hidden">e-office KA Pariwisata</h1>

  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto " src="{{asset('images/logo1.png')}}" alt="" height="82">
    <h1 class="display-5 fw-bold">E-Office</h1>
        <div class="col-lg-8 mx-auto">
      <p class="lead1 ">Visi</p>
      <p class="lead mb-3">Menjadi penyedia jasa kepariwisataan berbasis kereta api sebagai penunjang bisnis angkutan penumpang KAI untuk menciptakan manfaat bagi pemangku kepentingan</p>
      <p class="lead1">Misi</p>
      <p class="lead mb-4">Menyelenggarakan bisnis kepariwisataan berbasis kereta api dengan menawarkan produk layanan wisata berbasis rel bagi pasar pariwisata lokal, nasional dan internasional</p>

      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        @if (Auth::user()->roles == 'USER')
                            <a href="{{ url('user') }}" class="btn btn-primary btn-lg px-4 gap-3">Home</a>
                        @elseif (Auth::user()->roles == 'ADMIN')
                            <a href="{{ url('admin') }}" class="btn btn-primary btn-lg px-4 gap-3">Home</a>

                        @endif

                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
      </div>
    </div>
  </div>

