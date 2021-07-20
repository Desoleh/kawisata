<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
    $img = $document->photo;
 ?>

@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="content">
        <div class="container-fluid mt-1">
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
