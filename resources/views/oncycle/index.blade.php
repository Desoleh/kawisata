@extends('layouts.admin.appindex')

@section('title', "Upah Pokok Tunjangan Tetap")

@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- header --}}
                <div class="col-sm-6">
                    <h1>Gaji Pokok Tunjangan tetap</h1>
                </div>
                {{-- breadcrumb --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Gaji Pokok Tunjangan tetap</li>
                    </ol>
                </div>
                {{-- export-import --}}
                <div class="col-sm-4">
                    <a href="{{ route('oncycle.export') }}" class="btn btn-primary mt-2">export to xlsx</a>

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
                            <form action="{{route('oncycle.import') }}" method="POST" enctype="multipart/form-data">
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
                            <th>NIP</th>
                            <th>Nama Jabatan</th>
                            <th>Bank Gaji</th>
                            <th>No Rekening</th>
                            <th>Upah Pokok</th>
                            <th>Honorarium Pkwt</th>
                            <th>Bpjs Base</th>
                            <th>Tunj Perumahan</th>
                            <th>Tunj Adm Bank</th>
                            <th>Tunj Kurang Bayar</th>
                            <th>Tht Taspen Iur Pekerja 3 25</th>
                            <th>Jht Jwasraya Iur Persh 12 5</th>
                            <th>Jht Jwasraya Iur Pekerja 4 75</th>
                            <th>Jht Bpjs Iur Persh 3 7</th>
                            <th>Jht Bpjs Iur Pekerja 2</th>
                            <th>Jp Bpjs Iur Persh 2</th>
                            <th>Jp Bpjs Iur Pekerja 1</th>
                            <th>Jkk Bpjs Iur Persh 1 27</th>
                            <th>Jk Bpjs Iur Persh 0 3</th>
                            <th>Jpk Bpjs (Mandiri-Pkwt) Iur Persh 4</th>
                            <th>Jpk Bpjs (Mandiri-Pkwt) Iur Pekerja 1</th>
                            <th>Jpk Bpjs Iur Persh 4</th>
                            <th>Jpk Bpjs Iur Pekerja 1</th>
                            <th>Jpk Uk Iur Pekerja 1</th>
                            <th>Jpk Pensiunan Iur Persh 2</th>
                            <th>Jpk Pensiunan Iur Pekerja 2</th>
                            <th>Iur Spka</th>
                            <th>Pot Lain</th>
                            <th> Pot Sewa Rumah Dinas</th>
                            <th> Simpanan Baitul Ridho</th>
                            <th>Cicilan Baitul Ridho</th>
                            <th>Pot Kelebihan Bayar</th>
                            <th>Total Pajak</th>
                            <th>Bruto</th>
                            <th>Admin Bank</th>
                            <th>Netpay</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($oncycles as $oncycle)
                                <tr>
                                    <td>{{$oncycle->nama}}</td>
                                    <td>{{$oncycle->nip}}</td>
                                    <td>{{$oncycle->nama_jabatan}}</td>
                                    <td>{{$oncycle->bank_gaji}}</td>
                                    <td>{{$oncycle->no_rekening}}</td>
                                    <td>{{number_format($oncycle->upah_pokok, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->honorarium_pkwt, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->bpjs_base, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->tunj_perumahan, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->tunj_adm_bank, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->tunj_kurang_bayar, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->tht_taspen_iur_pekerja_3_25, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jht_jwasraya_iur_pekerja_4_75, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jht_bpjs_iur_pekerja_2, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jp_bpjs_iur_pekerja_1, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_bpjs_mand_iur_pekerja, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_bpjs_iur_pekerja_1, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_uk_iur_pekerja_1, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_pensiunan_iur_persh_2, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->jpk_pensiunan_iur_pekerja_2, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->iur_spka, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->pot_lain, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->pot_sewa_rumah_dinas, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->simpanan_baitul_ridho, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->cicilan_baitul_ridho, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->pot_kelebihan_bayar, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->total_pajak, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->bruto, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->admin_oncycle, 0, ',', '.')}}</td>
                                    <td>{{number_format($oncycle->netpay, 0, ',', '.')}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('oncycles.destroy',$oncycle->nip) }}" method="POST">

                                            <a class="btn btn-info btn-sm" href="{{ route('oncycles.show',$oncycle->nip) }}">Show</a>

                                            <a class="btn btn-primary btn-sm" href="{{ route('oncycles.edit',$oncycle->nip) }}">Edit</a>

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
