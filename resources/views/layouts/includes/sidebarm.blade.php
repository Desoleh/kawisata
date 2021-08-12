    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item">
                        <a href="index.html" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li class="sidebar-item has-sub {{ ($headmenu === ""  ? 'active' : '' ) }}">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-diagram-3-fill"></i>
                            <span>Struktur Organisasi</span>
                        </a>
                        <ul class="submenu {{ ($headmenu === ""  ? 'active' : '' ) }}">
                            <li class="submenu-item {{ ($title === "Struktur Organisasi"  ? 'active' : '' ) }}">
                                <a href="#">Struktur Organisasi</a>
                            </li>
                            <li class="submenu-item {{ ($title === "Struktur Jabatan"  ? 'active' : '' ) }}">
                                <a href="#">Struktur Jabatan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item has-sub {{ ($headmenu === "Data Pegawai"  ? 'active' : '' ) }}">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Data Pegawai</span>
                        </a>
                        <ul class="submenu {{ ($headmenu === "Data Pegawai"  ? 'active' : '' ) }}">
                            <li class="submenu-item {{ ($title === "Profil Pegawai"  ? 'active' : '' ) }}">
                                <a href="{{ route('user.profile') }}">Personal Data</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Pendidikan</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Pelatihan</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Keluarga</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Riwayat Jabatan</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Bank Detail</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Riwayat Kenaikan Pangkat</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Dokumen Lain</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item has-sub">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Info Rekan Kerja</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Info Rekan Kerja</a>
                            </li>
                            <li class="submenu-item {{ ($title === ""  ? 'active' : '' ) }}">
                                <a href="#">Info Ulang tahun</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x">
                <i data-feather="x"></i>
            </button>
        </div>
    </div>
