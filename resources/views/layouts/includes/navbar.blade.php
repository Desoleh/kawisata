{{-- navbar1 --}}
    <nav class="navbar navbar-expand-lg sticky-top flex-md-nowrap p-0 navbar-light bg-light">
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
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('mailbox.index') }}">Memo Internal</a>
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



{{-- /navbar --}}
