<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>Signin  | eoffice Ka Pariwisata</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/signin.css') }}">

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
        </style>


        <!-- Custom styles for this template -->
        <link href="{{asset('bootstrap/5.0/css/signin.css')}}" rel="stylesheet">

    </head>
    <body class="text-center">

        <main class="form-signin">
            <form method="POST" action="{{ route('login') }}">
                <img class="mb-4" src="{{asset('images/logo1.png')}}" alt=""  height="75">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <div>
                        <input id="floatingInput" type="email" class="form-control placeholder="name@example.com" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                {{-- <label for="floatingInput">Email address</label> --}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div>
                        <input id="floatingPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                {{-- <label for="floatingPassword">Password</label> --}}
                </div>

                <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                </div>

                <div class="form-group">

                    <div >
                        <button type="submit" class="w-100 btn btn-lg btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-link">Daftar</a>
                        @endif
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
                </div>
            </form>
        </main>

{{-- <div class="row">
<form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div> --}}


    </body>
</html>

