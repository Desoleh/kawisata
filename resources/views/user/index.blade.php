@extends('layouts.app')
@section('title', $title)
@push('style-before')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
@endpush
@push('script-after')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#frontliner").DataTable({
                lengthChange: false,
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
    </script>
@endpush
@section('content')
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-warning">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-0 bg-white border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Memo Internal Direksi</strong>
            <h4 class="mb-0 fs-1">Perpanjangan WFH/WFO Hingga 17 Agustus 2021</h4>
            <div class="mb-1 text-muted">12 Agustus 2021</div>
            <p class="card-text mb-auto" style="text-align: justify">Pemberlakuan WFH 100% bagi Pekerja Administrasi (tata usaha, kegiatan surat-menyurat, pengarsipan, pengolahan data, dan/atau penyusunan laporan), Pekerja dengan jenis pekerjaan yang terkait dengan perumusan kebijakan, pekerjaan yg berkaitan dengan otorisasi keuangan dan atau jenis pekerjaan yang dapat dilakukan menggunakan fasilitas daring, <strong> diperpanjang sampai dengan tanggal 17 Agustus 2021</strong></p>
            <a href="{{ asset('regulation/17aug.pdf') }}" class="stretched-link">download memo internal</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Memo Internal Direksi</strong>
            <h4 class="mb-0">Perpanjangan WFH/WFO Hingga 17 Agustus 2021</h4>
            <div class="mb-1 text-muted">12 Agustus 2021</div>
            <p class="card-text mb-auto" style="text-align: justify">Pemberlakuan WFH 100% bagi Pekerja Administrasi (tata usaha, kegiatan surat-menyurat, pengarsipan, pengolahan data, dan/atau penyusunan laporan), Pekerja dengan jenis pekerjaan yang terkait dengan perumusan kebijakan, pekerjaan yg berkaitan dengan otorisasi keuangan dan atau jenis pekerjaan yang dapat dilakukan menggunakan fasilitas daring, diperpanjang sampai dengan tanggal 17 Agustus 2021</p>
            <a href="{{ asset('regulation/17aug.pdf') }}" class="stretched-link">download memo internal</a>
            </div>
            <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('images/blogs/Jawa1.png') }}" class="img-fluid rounded-start" alt="..."  width="200" height="250">
            </div>
        </div>
        </div>
    </div>
</div>

  {{-- <h2 class="visually-hidden text-center">E-Office KA Pariwisata</h2> --}}
    <div class="container-fluid mt-3 mt-sm-2  ">
            <div class="row d-flex justify-content-between lg-flex">
                <div class="col-lg-3 col-md-6 col-sm-6  mx-lg-2 ">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body fs-1 fw-bolder">{{ $kantorpusat->jumlah }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="#">Kantor Pusat</a>
                            <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body fs-1 fw-bolder">{{ $perbantuan->jumlah }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="#">Perbantuan</a>
                            <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body fs-1 fw-bolder ">{{ $mandiri->jumlah }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="#">Mandiri</a>
                            <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body fs-1 fw-bolder">{{ $pkwt->jumlah }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="#">PKWT</a>
                            <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body fs-1 fw-bolder">{{ $frontliner->jumlah }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="#">Frontliner</a>
                            <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Frontliner</div>
                <div class="card-body">
                <table  class="table table-striped" id="frontliner">
                  <thead>
                    <tr>
                      <th>Kedudukan</th>
                      <th>Jumlah Pegawai</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($data2 as $data)
                    <tr>
                            <td>{{ $data->kedudukan }}</td>
                            <td>{{ $data->jumlah }}</td>
                    </tr>
                        @endforeach
                  </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>



</div>

@endsection


