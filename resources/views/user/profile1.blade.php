<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
 ?>

@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 ">
            <h1 >Profile</h1>
            </div>
            <div class="col-sm-6 ">
            <ol class="breadcrumb float-lg-end mt-lg-3">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">User Profile</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                        <div class="text-center mb-2">
                                @isset($documents->photo)
                                <img src="{{ url('/userphoto/'.$documents->photo) }}" class="img-thumbnail" alt="...">
                                @else
                                <img src="{{ asset('images/nophotos.png') }}" class="img-thumbnail" alt="...">
                                @endisset
                        </div>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Ganti Foto
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Ganti Foto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
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
                </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="tabset">
                        <!-- Tab 1 -->
                            <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
                            <label for="tab1">Personal Data</label>
                            <!-- Tab 2 -->
                            <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
                            <label for="tab2">Jabatan</label>
                            <!-- Tab 3 -->
                            <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
                            <label for="tab3">Lain-lain</label>

                            <div class="tab-panels">
                                <section id="marzen" class="tab-panel">
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
                                                            <td>Tempat, Tgl Lahir</td>
                                                            <td>{{$employee->tempat_lahir}}, {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->isoFormat('DD MMMM YYYY')}}</td>
                                                    </tr>
                                                    <tr>
                                                            <td>Tgl Masuk Kerja</td>
                                                            <td>{{ \Carbon\Carbon::parse($employee->tmt_kerja)->isoFormat('DD MMMM YYYY')}}</td>
                                                    </tr>

                                                    @isset($employee->gol_ruang)
                                                    <tr>
                                                            <td>Golongan Ruang</td>
                                                            <td>{{ $employee->gol_ruang}}</td>
                                                    </tr>
                                                    @else
                                                    @endisset

                                                    @isset($employee->tmt_pangkat)
                                                    <tr>
                                                            <td>Tmt Pangkat</td>
                                                            <td>{{ \Carbon\Carbon::parse($employee->tmt_pangkat)->isoFormat('DD MMMM YYYY')}}</td>
                                                    </tr>
                                                    @else
                                                    @endisset
                                            </tbody>
                                    </table>
                                </section>
                                <section id="rauchbier" class="tab-panel">
                                    <table class="table border-bottom border-black table-sm">
                                        <tbody>
                                                <tr>
                                                        <td>Nama Jabatan</td>
                                                        <td>{{$position->name}}</td>
                                                </tr>
                                                <tr>
                                                        <td>ID Jabatan</td>
                                                        <td>{{$position->position_id}}</td>
                                                </tr>
                                                @if (empty($position->grade))
                                                @else
                                                <tr>
                                                        <td>Grade/Class Jabatan</td>
                                                        <td>{{$position->grade}}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                        <td>Unit</td>
                                                        <td>{{ $position->parent_name }}</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </section>
                                <section id="dunkles" class="tab-panel">
                                    <table class="table border-bottom border-black table-sm">
                                        <tbody>
                                                <tr>
                                                        <td>NIK</td>
                                                        <td>{{ $account->ktp }}</td>
                                                </tr>
                                                <tr>
                                                        <td>NPWP</td>
                                                        <td>{{ $account->npwp }}</td>
                                                </tr>
                                                <tr>
                                                        <td>No. BPJS</td>
                                                        <td>{{ $account->jamsostek }}</td>
                                                </tr>
                                                <tr>
                                                        <td>Alamat</td>
                                                        <td>{{ $account->alamat1 }}
                                                                <br> {{ $account->alamat2 }}
                                                                <br> {{ $account->District }}, {{ $account->City }}, {{ $account->Postal }} </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--

  Radio version of tabs.

  Requirements:
  - not rely on specific IDs for CSS (the CSS shouldn't need to know specific IDs)
  - flexible for any number of unkown tabs [2-6]
  - accessible

  Caveats:
  - since these are checkboxes the tabs not tab-able, need to use arrow keys

  Also worth reading:
  http://simplyaccessible.com/article/danger-aria-tabs/
-->

<p><small>Source: <cite><a href="https://www.bjcp.org/stylecenter.php">BJCP Style Guidelines</a></cite></small></p>

@endsection


