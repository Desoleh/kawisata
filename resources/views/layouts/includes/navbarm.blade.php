<nav class="navbar navbar-expand-lg sticky-top flex-md-nowrap p-0 navbar-dark bg-purple ml-5">
      <a class="navbar-brand" href="/">
                  <img src="{{asset('images/logo.png')}}" alt="" height=60">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link" href="/user">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="/user/profile">Profil Pegawai</a>
      <a class="nav-link" href="/user/salary">Penghasilan</a>
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
