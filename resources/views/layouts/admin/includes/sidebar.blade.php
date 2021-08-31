<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{asset('images/logo.png')}}" alt="" height=60">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

            {{-- menu utama --}}
            <li class="nav-item">
                <a href="/admin/employees" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Data Pegawai
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/employees" class="nav-link @yield('employees')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Induk Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jabatan.index') }}" class="nav-link  @yield('jabatan')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Jabatan Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('pribadi')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Pribadi Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('dokumen')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dokumen Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('accounts.index') }}" class="nav-link @yield('dokumen')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Akun dan Alamat</p>
                        </a>
                    </li>

                </ul>
            </li>
            {{-- penghaslan pegawai --}}
            <li class="nav-item">
                <a href="#" class="nav-link @yield('salary')">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Penghasilan Pegawai
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/oncycles" class="nav-link @yield('oncycle')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>On Cycle</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/offcycles" class="nav-link @yield('offcycle')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Off Sycle</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('nonupah')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Non Upah</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- peraturan perusahaan --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Peraturan Perusahaan
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('regulations.indexadmin') }}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Peraturan Kawisata</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Peraturan KAI</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Peraturan Pemerintah</p>
                        </a>
                    </li>

                </ul>
            </li>



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
