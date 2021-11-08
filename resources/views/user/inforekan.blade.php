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
            $("#inforekan").DataTable({
                lengthChange: false,
            });
        });
    </script>

@endpush
@section('content')
<div class="container justify-content-center">
            <section class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6 ps-4 pt-2">
                    <h2>Info Rekan</h2>
                    </div>
                    <div class="col-sm-6 ">
                    <ol class="breadcrumb float-lg-end mt-lg-3">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                    </div>
                </div>
            </section>
</div>
<div class="container justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Info Rekan</div>
                <div class="card-body">
                <table  class="table table-striped" id="inforekan">
                  <thead>
                    <tr>
                      <th>NIPP/NIP</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($employees as $employee)
                    <tr>
                            <td><a class="text-dark text-decoration-none" href="{{ route('user.infoRekanDetail', $employee->nip) }}">{{ $employee->nip }}</a></td>
                            <td><a class="text-dark text-decoration-none" href="{{ route('user.infoRekanDetail', $employee->nip) }}">{{ $employee->nama}}</a></td>
                            <td><a class="text-dark text-decoration-none" href="{{ route('user.infoRekanDetail', $employee->nip) }}">{{ $employee->name}}</a></td>
                            <td><a class="btn btn-outline-primary text-decoration-none" href="{{ route('user.infoRekanDetail', $employee->nip) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                    </svg>
                                </a>
                            </td>
                    </tr>
                        @endforeach
                  </tbody>
                </table>

                </div>
            </div>
        </div>
</div>


@endsection


