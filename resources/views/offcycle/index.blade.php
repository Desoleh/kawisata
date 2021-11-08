@extends('layouts.admin.appindex')

@section('title', 'Upah Pokok Tunjangan Tetap')
@section('salary', 'Active')
@section('offcycle', 'Active')


@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- header --}}
                <div class="col-sm-6">
                    <h1>Tunjangan Tidak Tetap</h1>
                </div>
                {{-- breadcrumb --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
                    <li class="breadcrumb-item active">Tunjangan Tidak Tetap</li>
                    </ol>
                </div>
                {{-- export-import --}}
                <div class="col-sm-4">
                    <a href="{{ route('offcycle.export') }}" class="btn btn-primary mt-2">export to xlsx</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                        Import Data
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Impor Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('offcycle.import') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="file" name="import_file">
                                        <br />
                                        {{-- <input type="submit" value="Import" class="btn btn-info"> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" value="Import"  class="btn btn-primary">Impor data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- cetak daftar gaji --}}
                    {{-- <form class="form " method="get" action="{{ route('searchoffcycle') }}">
                            <div class="form-group">
                                <select type="text" name="search"  class="custom-select w-auto" id="search" placeholder="Masukkan keyword">
                                    <option selected value="">Pilih bulan</option>
                                    @foreach ($bulangajis as $bulangaji)
                                        <option value="{{ $bulangaji->bulangaji }}" {{ request()->get("search") == $bulangaji->bulangaji  ? "selected" : "" }}>{{$bulangaji->bulangaji }}</option>
                                    @endforeach
                                </select>

                                <button name="submit"  type="submit" value="1" class="btn btn-primary ">Lihat</button>
                                <button name="submit"  type="submit" value="2" class="btn btn-primary ">Download</button>
                                </button>
                        @error('search')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                            </div>
                    </form> --}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">

                <div class="card">
                {{-- <div class="card-header"> --}}
                    {{-- <h3 class="card-title">Data Pekerja</h3> --}}
                {{-- </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped small">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nip</th>
                                <th>Nama Bank</th>
                                <th>Nomor Rekening</th>
                                <th>Tunjangan Transport</th>
                                <th>Tunjangan Komunikasi</th>
                                <th>Tunjangan Jabatan</th>
                                <th>Tunjangan Kinerja Pegawai</th>
                                <th>Tunjangan Kemahalan</th>
                                <th>Tunjangan Cuti</th>
                                <th>Tunjangan Profesi</th>
                                <th>Tunjangn Tidak Tetap Pkwt</th>
                                <th>Bruto</th>
                                <th>Potongan Lain</th>
                                <th>Bruto</th>
                                <th>Admin Bank</th>
                                <th>Netpay</th>
                                <th>Tunjangan Keahlian</th>
                                <th>Prestasi</th>
                                <th>Shift Allowance</th>
                                <th>Best Performance</th>
                                <th>Lembur</th>
                                <th>Penalty</th>
                                <th>Netpaycc121</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($offcycles as $offcycle)
                                    <tr>
                                        <td>{{$offcycle->nama}}</td>
                                        <td>{{$offcycle->nip}}</td>
                                        <td>{{$offcycle->nama_bank}}</td>
                                        <td>{{$offcycle->nomor_rekening}}</td>
                                        <td>{{number_format($offcycle->tunjangan_transport, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_komunikasi, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_jabatan, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_kinerja_pegawai, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_kemahalan, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_cuti, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_profesi, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangn_tidak_tetap_pkwt, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->bruto, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->potongan_lain, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->bruto1, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->admin_bank, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->netpay, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->tunjangan_keahlian, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->prestasi, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->shift_allowance, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->best_performance, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->lembur, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->penalty, 0, ',', '.')}}</td>
                                        <td>{{number_format($offcycle->netpaycc121, 0, ',', '.')}}</td>
                                        <td class="text-center">
                                            <form action="{{ route('offcycles.destroy',$offcycle->nip) }}" method="POST">

                                                <a class="btn btn-info btn-sm" href="{{ route('offcycles.show',$offcycle->nip) }}">Show</a>

                                                <a class="btn btn-primary btn-sm" href="{{ route('offcycles.edit',$offcycle->nip) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">No User Found</td>
                                        </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
