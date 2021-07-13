<nav class="navbar navbar-expand-lg navbar-dark bg-purple sticky-top">
    <a class="navbar-brand" href="/">
        <img src="{{asset('images/logo2.png')}}" alt="" height=60">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="navbar-nav">
        <a class="nav-link" href="/user">Home <span class="sr-only">(current)</span></a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profil Pegawai
                </a>
                <div class="dropdown-menu bg-purple" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.profile') }}">Info Data Pribadi</a>
                <a class="dropdown-item" href="#">Info Rekan Kerja</a>
                <a class="dropdown-item" href="#">Info Ulang Tahun</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('user.salary') }}">Slip Gaji</a>
                </div>
            </li>
        <a class="nav-link" href="/user/peraturan">Peraturan Perusahaan</a>
        <a class="nav-link {{ ($title === "Memo Internal"  ? 'active' : '' ) }} " href="{{ route('mailbox.index') }}">Memo Internal</a>
        </div>
            <ul class="navbar-nav ml-auto mr-4">
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
                                    <a id="nav-link" class="nav-link active" href="{{ route('user.profile') }}"  aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    </a>

                                </li>
                                <a class=" text-black btn btn-warning" href="{{ route('logout') }}"
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
</nav>