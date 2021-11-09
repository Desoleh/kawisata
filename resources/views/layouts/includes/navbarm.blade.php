<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo2.png')}}" alt="" height=60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
  	          <a class="nav-link text-white {{ ($title === "Beranda"  ? 'active' : '' ) }}" aria-current="page" href="{{ route('user.home') }}">Beranda</a>
            </li>
            <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white {{ ($title === "Profil Pegawai"  ? 'active' : '' ) }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Profil Pekerja
							</a>
							<ul class="dropdown-menu  navbar-dark bg-primary" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item text-white bg-primary" href="{{ route('user.profile') }}">Info Data Pribadi</a></li>
									<li><a class="dropdown-item text-white bg-primary" href="{{ route('user.salary') }}">Slip Gaji</a></li>
                                     <li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item text-white bg-primary" href="{{ route('user.inforekan') }}">Info Rekan Kerja</a></li>
									<li><a class="dropdown-item text-white bg-primary" href="{{ route('user.infoultah') }}">Info Ulang Tahun</a></li>
							</ul>
            </li>
            <li class="nav-item">
	            <a class="nav-link text-white" href="{{ route('regulations.index') }}">Peraturan Perusahaan</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto mr-4">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
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
                                {{ Auth::user()->employee->nama }}
                                </a>

                            </li>
                            <a class=" text-black btn btn-warning" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
        </ul>
        </div>
    </div>
</nav>
