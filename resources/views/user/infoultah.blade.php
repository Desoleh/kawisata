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
            $("#infoultah").DataTable({
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
                    <h2>Ulang Tahun Pekerja Bulan ini</h2>
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
                {{-- <div class="card-header">Info Ulang tahun</div> --}}
                <div class="card-body">
                <table  class="table table-striped" id="inforekan">
                  <thead>
                    <tr>
                      <th>NIPP/NIP</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Tanggal Lahir</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($employees as $employee)
                    <tr>
                            <td>{{ $employee->nip }}</td>
                            <td><a class="text-dark text-decoration-none" href="{{ route('user.infoRekanDetail', $employee->nip) }}">{{ $employee->nama}}</a></td>
                            <td>{{ $employee->position->name ?? 'N/A'}}</td>
                            <td>{{ $employee->tanggal_lahir}}</td>
                    </tr>
                        @endforeach
                  </tbody>
                </table>

                </div>
            </div>
        </div>
</div>


@endsection


