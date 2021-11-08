{{-- navbar1 --}}
    <nav class="navbar navbar-expand-lg sticky-top flex-md-nowrap p-0 navbar-dark bg-purple">
        <div class="container">
            <a class="navbar-brand" href="/">
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
                    <a class="nav-link {{ ($title === "Beranda"  ? 'active' : '' ) }}" aria-current="page" href="/user">Beranda</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{ ($title === "Profil Pegawai"  ? 'active' : '' ) }} " href="/user/profile">Profil Pegawai</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{ ($title === "Penghasilan"  ? 'active' : '' ) }}" href="/user/salary">Penghasilan</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/peraturan">Peraturan Perusahaan</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('mailbox.index') }}">Memo Internal</a>
                    </li>

                </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link active" href="/user/profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                            </li>
                            <a class="nav-link active text-black btn btn-warning" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>

            </div>

        </div>
    </nav>



{{-- /navbar --}}
