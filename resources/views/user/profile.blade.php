<?php
    $nama = $employee->nama;
    $nip = $employee->nip;

    $img = $documents->photo;


    // if(is_null($documents->photo)){
    //     $img = 'nophotos.png';
    // }


 ?>


@extends('layouts.app')




@section('title', $judulhalaman)

      {{-- @include('layouts.includes.navbar') --}}

@section('sidebar')
    <div class="list-group list-group-flush">
        <div class="accordion" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Data Pegawai
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <a class="list-group-item list-group-item-action bg-primary p-2 pl-4" href="/user/profile">Info Data Pribadi</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Rekan Kerja</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="/user/salary">Slip Gaji</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Ulang tahun</a>

                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Employee Self Service (ESS)
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="/user/profile">Pelaporan Data Pegawai</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Pengajuan Cuti</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Pengajuan Dinas</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Ulang tahun</a>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Struktur Organisasi
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="/user/profile">Struktur Organisasi</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Struktur Jabatan</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Job Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('togglemenu')
    @include('layouts.includes.togglemenu')
@endsection

@section('content')

    <section class="content">
            <div class="container">
                <div class="row">
                <div class="col-md-4 col-lg-2 d-md-block bg-light small d-inline">

                    <!-- Profile photo -->
                    <div class="card card-primary card-outline mt-1 ">
                    <div class="card-body box-profile">
                        <div class="text-center mb-2">
                            @isset($img)
                            <img src="{{ url('/userphoto/'.$img) }}" class="img-thumbnail box2" alt="...">
                            @else
                            <img src="{{ asset('images/nophotos.png') }}" class="img-thumbnail" alt="...">
                            @endisset
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ganti Foto
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <form action="/file-upload" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="modal-body">

                                            <div class="form-group">
                                                <b>File Gambar</b><br/>
                                                <input type="file" name="photo">
                                            </div>

                                            {{-- <input type="submit" value="Upload" class="btn btn-primary"> --}}

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" value="Upload" class="btn btn-primary">Upload Foto</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-8 ms-sm-auto col-lg-10 px-md-4 small d-inline">
                    <div class="card card-primary card-outline mt-1">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            Profil Pegawai dan Dokumen
                            </h3>
                        </div>
                        <div class="card-body">
                            <h7>Data per tanggal : 13.06.2021</h7>
                            <div class="row mt-2">
                                    <div class="d-flex align-items-start justify-content-lg-start">
                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal data</button>
                                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Pendidikan</button>
                                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Pelatihan</button>
                                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Keluarga</button>
                                        </div>
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                {{-- tabel personal --}}
                                                <table class="table border-bottom border-black table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>{{$employee->nama}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIPP/NIP</td>
                                                            <td>{{$nip}}</td>
                                                        </tr>
                                                        @if (empty($employee->gelar))
                                                        @else
                                                        <tr>
                                                            <td>Gelar</td>
                                                            <td>{{$employee->gelar}}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>proses</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat, Tgl Lahir</td>
                                                            <td>{{$employee->tempat_lahir}}, {{$employee->tanggal_lahir}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tgl Masuk Kerja</td>
                                                            <td>{{$employee->tmt_kerja}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TMT Pangkat</td>
                                                            <td>{{$employee->tmt_pangkat}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                {{-- /tabel personal --}}
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->


    </section>


@endsection

