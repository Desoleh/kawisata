<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
 ?>

@extends('layouts.app')

@section('title', $title)

@push('style')
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/custom-sidebar.min.css') }}">
@endpush

@push('script-after')
        <script src="{{ asset('js/main.min.js') }}"></script>

@endpush

@section('content')
<div id="app">
    @include('layouts.includes.sidebarm')
    <div id="main">
        <header>
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

            <section class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6 ps-4 pt-2">
                    <h2>Profile</h2>
                    </div>
                    <div class="col-sm-6 ">
                    <ol class="breadcrumb float-lg-end mt-lg-3">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                    </div>
                </div>
            </section>
        <div class="page-content">
            {{-- content --}}
                <section>
                    <div class="container-fluid">
                        <div class="row">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                                </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Ganti Foto
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Ganti Foto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <b>File Foto</b><br/>
                                                            <input type="file" name="photo">
                                                            @error('search')
                                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" value="upload" class="btn btn-primary">Save changes</button>
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
                                        <input type="radio" name="tabset" id="tab1" aria-controls="marzen" {{ ($title === "Profil Pegawai"  ? 'checked' : '' ) }}>
                                        <label for="tab1">Personal Data</label>
                                        <!-- Tab 2 -->
                                        <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
                                        <label for="tab2">Jabatan</label>
                                        <!-- Tab 3 -->
                                        <input type="radio" name="tabset" id="tab3" aria-controls="dunkles" {{ ($title === "Dokumen Pegawai"  ? 'checked' : '' ) }}>
                                        <label for="tab3">Dokumen</label>

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
                                                <table class="table table-bordered border-black table-sm">
                                                    <tbody>
                                                            <tr style="vertical-align: middle">
                                                                    <td>Akte Kelahiran</td>
                                                                    @isset($akte)
                                                                    <td>
                                                                        <a href="{{ route('download.akte', $akte->uuid) }}">download</a>
                                                                    </td>
                                                                    @else
                                                                    <td></td>
                                                                    @endisset
                                                                <td>
                                                                    <a href="#akte" data-bs-toggle="modal" >upload</a>
                                                                </td>
                                                            </tr>
                                                            <tr style="vertical-align: middle">
                                                                <td>KTP</td>
                                                                    @isset($ktp)
                                                                    <td>
                                                                        <a href="{{ route('download.ktp', $ktp->uuid) }}">download</a>
                                                                    </td>
                                                                    @else
                                                                    <td></td>
                                                                    @endisset
                                                                <td>
                                                                    <a href="#ktp" data-bs-toggle="modal" >upload</a>
                                                                </td>
                                                            </tr>
                                                            <tr style="vertical-align: middle">
                                                                    <td>Kartu Keluarga</td>
                                                                    @isset($kk)
                                                                    <td>
                                                                        <a href="{{ route('download.kk', $kk->uuid) }}">download</a>
                                                                    </td>
                                                                    @else
                                                                    <td></td>
                                                                    @endisset
                                                                <td>
                                                                    <a href="#kk" data-bs-toggle="modal" >upload</a>
                                                                </td>
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
            {{-- /content --}}
        </div>
    </div>
</div>

<!-- Modal akte -->
<div class="modal fade" id="akte" tabindex="-1" aria-labelledby="akteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="akteLabel">Upload Akte Kelahiran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{ route('upload.akte') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <b>File Akte Kelahiran</b><br/>
                        <input type="file" name="doc">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="upload" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal ktp -->
<div class="modal fade" id="ktp" tabindex="-1" aria-labelledby="ktpLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="ktpLabel">Upload KTP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{ route('upload.ktp') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <b>File KTP</b><br/>
                        <input type="file" name="doc">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="upload" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal kk -->
<div class="modal fade" id="kk" tabindex="-1" aria-labelledby="kkLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="kkLabel">Upload Kartu Keluarga</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{ route('upload.kk') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <b>File Kartu Keluarga</b><br/>
                        <input type="file" name="doc">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="upload" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection


