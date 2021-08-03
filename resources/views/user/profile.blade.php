<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
    $img = $documents->photo;
 ?>

@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
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
                                @isset($img)
                                <img src="{{ url('/userphoto/'.$img) }}" class="img-thumbnail" alt="...">
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
                        <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Data</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
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

                                        @isset($employee->tmt_pangkat)
                                        <tr>
                                            <td>Tmt Pangkat</td>
                                            <td>{{ \Carbon\Carbon::parse($employee->tmt_pangkat)->isoFormat('DD MMMM YYYY')}}</td>
                                        </tr>
                                        @else
                                        @endisset
                                        <tr>
                                            <td>Golongan Ruang</td>
                                            <td>{{ $employee->gol_ruang}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
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

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                                </div>
                            </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection

