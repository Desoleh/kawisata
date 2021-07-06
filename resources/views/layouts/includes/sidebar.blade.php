<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <div class="accordion" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button {{ ($headmenu === "Data Pegawai"  ? '' : 'collapsed' ) }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Data Pegawai
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse {{ ($headmenu === "Data Pegawai"  ? '' : 'collapse' ) }}" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <a class="list-group-item list-group-item-action  p-2 pl-4 {{ ($title === "Profil Pegawai"  ? 'bg-primary' : '' ) }} " href="/user/profile">Info Data Pribadi</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Rekan Kerja</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4 {{ ($title === "Penghasilan"  ? 'bg-primary' : '' ) }} " href="/user/salary">Slip Gaji</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Ulang tahun</a>

                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button {{ ($headmenu === "ess"  ? '' : 'collapsed' ) }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Employee Self Service (ESS)
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse {{ ($headmenu === "ess"  ? '' : 'collapse' ) }}" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="/user/profile">Pelaporan Data Pegawai</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Pengajuan Cuti</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Pengajuan Dinas</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Ulang tahun</a>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button {{ ($headmenu === "Struktur Organisasi"  ? '' : 'collapsed' ) }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Struktur Organisasi
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse {{ ($headmenu === "Struktur Organisasi"  ? '' : 'collapse' ) }}" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="{{ route('struktur') }}">Struktur Organisasi</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Struktur Jabatan</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Job Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
