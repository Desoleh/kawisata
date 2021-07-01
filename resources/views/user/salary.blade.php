<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
        $img = $document->photo;
 ?>

@extends('layouts.app')

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
                    <a class="list-group-item list-group-item-action p-2 pl-4" href="/user/profile">Info Data Pribadi</a>
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Rekan Kerja</a>
                    <a class="list-group-item list-group-item-action bg-primary p-2 pl-4" href="/user/salary">Slip Gaji</a>
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
                    <a class="list-group-item list-group-item-action  p-2 pl-4" href="#!">Info Ulang tahun</a>                            </div>
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

@section('content')
    <section class="content">
        <div class="container mt-1">
            {{-- profil picture --}}
            <div class="row">
                <!-- profil text -->
                <div class="col-md-12 pt-1">
                    <div class="card p-1">
                        {{-- <div class="card-header">
                            Penghasilan Bulan :
                                <h4 class="card-title">Penghasilan Bulan : </h4>
                        </div> --}}


                        <div class="card card-primary card-outline mt-1">
                            <ul class="nav nav-pills ms-2 mt-2 bg-light" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-uptt-tab" data-bs-toggle="pill" data-bs-target="#pills-uptt" type="button" role="tab" aria-controls="pills-uptt" aria-selected="true">Upah Pokok & Tunjangan tetap</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-ttt-tab" data-bs-toggle="pill" data-bs-target="#pills-ttt" type="button" role="tab" aria-controls="pills-ttt" aria-selected="false">Tunjangan Tidak tetap</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-nuph-tab" data-bs-toggle="pill" data-bs-target="#pills-nuph" type="button" role="tab" aria-controls="pills-nuph" aria-selected="false">Non Upah</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-uptt" role="tabpanel" aria-labelledby="pills-uptt-tab">
                                    <p>
                                    <div class="container small">

                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="col ">
                                                    <form class="form " method="get" action="{{ route('search') }}">
                                                            <div class="form-group">
                                                                <select type="text" name="search"  class="custom-select w-25" id="search" placeholder="Masukkan keyword">
                                                                    <option selected>Pilih bulan</option>
                                                                    <option value="Januari 2021">Januari 2021</option>
                                                                    <option value="Februari 2021">Februari 2021</option>
                                                                    <option value="Maret 2021">Maret 2021</option>
                                                                    <option value="April 2021">April 2021</option>
                                                                    <option value="Mei 2021">Mei 2021</option>
                                                                </select>
                                                                <button type="submit" class="btn btn-primary">Cari</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="2" class="table-active" style="width:70%">Data Pegawai</th>
                                                        </tr>
                                                        <tr ><td>Nama</td><td>{{$nama}}</td></tr>
                                                        <tr><td>NIPP / NIP</td><td>{{$nip}}</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="2" class="table-active" style="width:70%">Tunjangan</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                            <tr>
                                                                <th colspan="2" class="table-active" style="width:70%">Potongan</th>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-ttt" role="tabpanel" aria-labelledby="pills-ttt-tab">
                                </div>
                                <div class="tab-pane fade" id="pills-nuph" role="tabpanel" aria-labelledby="pills-nuph-tab">...</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </section>

@endsection
