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
    <section id="content-header" class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h2>Profil Pekerja</h2>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb  float-sm-end mt-sm-2">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.inforekan') }}">Info Rekan</a></li>
                <li class="breadcrumb-item active">Profil Pekerja</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>

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
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card">
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
                                                <tr>
                                                        <td>Tempat, Tgl Lahir</td>
                                                        <td>{{$employee->tempat_lahir}}, {{$employee->tanggal_lahir}}</td>
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
                                                        <td>Alamat</td>
                                                        <td>{{ $employee->account->alamat1 }}
                                                                <br> {{ $employee->account->alamat2 }}
                                                                <br> {{ $employee->account->District }}, {{ $employee->account->City }}, {{ $employee->account->Postal }} </td>
                                                </tr>
                                            <tr>
                                                    <td>Nama Jabatan</td>
                                                    <td>{{$position->name}}</td>
                                            </tr>
                                            <tr>
                                                    <td>Unit</td>
                                                    <td>{{ $position->parent_name }}</td>
                                            </tr>

                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            {{-- /content --}}
        </div>
    </div>
</div>


@endsection


