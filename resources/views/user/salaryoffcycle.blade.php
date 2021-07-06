<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
        $img = $document->photo;
 ?>

@extends('layouts.app')

@section('title', $title)

@section('sidebar')
    @include('layouts.includes.sidebar')
@endsection

@section('togglemenu')
    @include('layouts.includes.togglemenu')
@endsection

@section('content')
    <section class="content">


        <div class="container mt-1">

            {{-- profil --}}
            <div class="row">
                <!-- profil text -->
                <div class="col-md-12 pt-1">
                    <div class="card card-primary p-1">
                        {{-- <div class="card-header">
                            @forelse ($oncycles as $oncycle )
                                <h3 class="card-title">Penghasilan Bulan : {{$oncycle->bulan}} </h3>
                            @empty
                                <h3 class="card-title">Penghasilan Bulan : </h3>
                            @endforelse
                        </div> --}}

                        <div class="card card-primary card-outline">
                            <ul class="nav nav-pills ms-2 mt-2" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-uptt-tab" data-bs-toggle="pill" data-bs-target="#pills-uptt" type="button" role="tab" aria-controls="pills-uptt" aria-selected="true">Upah Pokok & Tunjangan tetap</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-ttt-tab" data-bs-toggle="pill" data-bs-target="#pills-ttt" type="button" role="tab" aria-controls="pills-ttt" aria-selected="false">Tunjangan Tidak tetap</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-nuph-tab" data-bs-toggle="pill" data-bs-target="#pills-nuph" type="button" role="tab" aria-controls="pills-nuph" aria-selected="false">Non Upah</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                {{-- oncycle --}}
                                <div class="tab-pane fade" id="pills-uptt" role="tabpanel" aria-labelledby="pills-uptt-tab">
                                    <div class="container mt-2 small">

                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="col mt-2 ">
                                                    <form class="form " method="get" action="{{ route('search') }}" id="search">
                                                            <div class="form-group">
                                                                <select type="text" name="search"  class="custom-select w-25" id="search" placeholder="Masukkan keyword">
                                                                    <option selected>Pilih bulan</option>
                                                                    <option value="Januari 2021">Januari 2021</option>
                                                                    <option value="Februari 2021">Februari 2021</option>
                                                                    <option value="Maret 2021">Maret 2021</option>
                                                                    <option value="April 2021">April 2021</option>
                                                                    <option value="Mei 2021">Mei 2021</option>
                                                                </select>
                                                                <button type="submit" class="btn btn-primary ">Cari</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Download Slip Gaji
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Download Slip Gaji</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                            <form class="form " method="get" action="{{ route('cetakoncycle') }}">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <select type="text" name="search"  class="custom-select w-25" id="search" placeholder="Masukkan keyword">
                                                                            <option selected>Pilih bulan</option>
                                                                            <option value="Januari 2021">Januari 2021</option>
                                                                            <option value="Februari 2021">Februari 2021</option>
                                                                            <option value="Maret 2021">Maret 2021</option>
                                                                            <option value="April 2021">April 2021</option>
                                                                            <option value="Mei 2021">Mei 2021</option>
                                                                        </select>
                                                                    </div>
                                                                        {{-- <input type="submit" value="Upload" class="btn btn-primary"> --}}

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" value="Upload" class="btn btn-primary" formtarget="_blank">Download</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>

                                                        @forelse ($oncycles as $oncycle )
                                                        <tr>
                                                            <th colspan="2" class="table-active" style="width:70%">
                                                                @forelse ($oncycles as $oncycle)
                                                                Upah Pokok Tunjangan Tetap : {{$oncycle->bulan}}
                                                                @empty
                                                                Upah Pokok Tunjangan Tetap :
                                                                @endforelse
                                                            </th>
                                                        </tr>
                                                        <tr ><td>Nama</td><td>{{$nama}}</td></tr>
                                                        <tr><td>NIPP / NIP</td><td>{{$nip}}</td></tr>
                                                        <tr><td>Jabatan</td><td>{{$oncycle->nama_jabatan}}</td></tr>
                                                        <tr><td>Bank</td><td>{{$oncycle->bank_gaji}}</td></tr>
                                                        <tr><td>No. Rekening</td><td>{{$oncycle->no_rekening}}</td></tr>
                                                        <tr class=" fw-bolder fs-6">
                                                            <td colspan="2" class="total table-primary text-center">Take Home Pay</td>
                                                        </tr>
                                                        <tr class=" fw-bolder fs-6">
                                                                <td colspan="2" class="total table-primary text-center" > Rp.
                                                                {{number_format($oncycle->netpay, 0, ',', '.')}}
                                                                </td>
                                                        </tr>
                                                        @empty
                                                        <p>Data Kosong</p>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($oncycles as $oncycle )


                                                        <tr>
                                                            <th colspan="2" class="table-active" style="width:70%">Upah dan Tunjangan</th>
                                                        </tr>
                                                            @if($oncycle->upah_pokok == 0)
                                                            @else
                                                            <tr><td>Upah Pokok</td><td style="text-align:right">{{number_format($oncycle->upah_pokok, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->honorarium_pkwt == 0)
                                                            @else
                                                            <tr><td>Upah Pokok</td><td style="text-align:right">{{number_format($oncycle->honorarium_pkwt, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            <tr><td colspan="2" style="font-weight: 500">Tunjangan Tetap :</td></tr>

                                                            @if($oncycle->tunj_perumahan  == 0)
                                                            @else
                                                            <tr><td>-  Tunjangan Perumahan</td><td style="text-align:right">{{number_format($oncycle->tunj_perumahan, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->tunj_adm_bank  == 0)
                                                            @else
                                                            <tr><td>-  Tunjangan Administrasi Bank</td><td style="text-align:right">{{number_format($oncycle->tunj_adm_bank, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Sosial Ketenagakerjaan BPJS :</td></tr>
                                                            <tr><td>-  Jaminan Hari Tua 3,7%</td><td style="text-align:right">{{number_format($oncycle->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Jaminan Pensiun 2%</td><td style="text-align:right">{{number_format($oncycle->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Jaminan Kecelakaan Kerja 1,27%</td><td style="text-align:right">{{number_format($oncycle->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Jaminan Kematian 0,3%</td><td style="text-align:right">{{number_format($oncycle->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td></tr>

                                                            @if($oncycle->jht_jwasraya_iur_persh_12_5  == 0)
                                                            @else
                                                            <tr><td>Jaminan Hari Tua Jiwasraya 12,5%</td><td style="text-align:right">{{number_format($oncycle->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Pemeliharaan Kesehatan (JPK)</td></tr>

                                                            @if($oncycle->jpk_bpjs_mand_iur_persh  == 0)
                                                            @else
                                                            <tr><td>-  JPK BPJS 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->jpk_bpjs_iur_persh_4  == 0)
                                                            @else
                                                            <tr><td>-  JPK BPJS 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->jpk_pensiunan_iur_persh_2  == 0)
                                                            @else
                                                            <tr><td>-  JPK Pensiunan 2%</td><td style="text-align:right">{{number_format($oncycle->jpk_pensiunan_iur_persh_2, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->total_pajak  == 0)
                                                            @else
                                                            <tr><td>Tunjangan Pajak</td><td style="text-align:right">{{number_format($oncycle->total_pajak, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->tunj_kurang_bayar  == 0)
                                                            @else
                                                            <tr><td>Tunjangan Kekurangan Bayar</td><td style="text-align:right">{{number_format($oncycle->tunj_kurang_bayar, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                        @empty
                                                        <p>Data Kosong</p>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($oncycles as $oncycle )
                                                            <tr>
                                                                <th colspan="2" class="table-active" style="width:70%">Potongan</th>
                                                            </tr>

                                                            @if($oncycle->jht_jwasraya_iur_persh_12_5 == 0)
                                                            @else
                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Hari Tua Jiwasraya :</td></tr>
                                                            <tr><td>-  Iuran Perusahaan 12,5%</td><td style="text-align:right">{{number_format($oncycle->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Iuran Pekerja 4,75%</td><td style="text-align:right">{{number_format($oncycle->jht_jwasraya_iur_pekerja_4_75, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Hari Tua BPJS Ketenagakerjaan :</td></tr>
                                                            <tr><td>-  Iuran Perusahaan 3,7%</td><td style="text-align:right">{{number_format($oncycle->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Iuran Pekerja 2%</td><td style="text-align:right">{{number_format($oncycle->jht_bpjs_iur_pekerja_2, 0, ',', '.')}}</td></tr>
                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Pensiun BPJS Ketenagakerjaan :</td></tr>
                                                            <tr><td>-  Iuran Perusahaan 2%</td><td style="text-align:right">{{number_format($oncycle->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jp_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
                                                            <tr><td>Jaminan Kecelakaan Kerja BPJS 1,27%</td><td style="text-align:right">{{number_format($oncycle->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td></tr>
                                                            <tr><td>Jaminan Kematian BPJS 0,3%</td><td style="text-align:right">{{number_format($oncycle->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td></tr>

                                                            @if($oncycle->jpk_bpjs_mand_iur_persh == 0)
                                                            @else
                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Mandiri-PKWT) :</td></tr>
                                                            <tr><td>-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_pekerja_1, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->jpk_bpjs_iur_persh_4 == 0)
                                                            @else
                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Perbantuan) :</td></tr>
                                                            <tr><td>-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->jpk_pensiunan_iur_persh_2 == 0)
                                                            @else
                                                            <tr><td colspan="2" style="font-weight: 500">Jaminan Kesehatan Pensiunan :</td></tr>
                                                            <tr><td>-  Iuran Perusahaan 2%</td><td style="text-align:right">{{number_format($oncycle->jpk_pensiunan_iur_persh_2, 0, ',', '.')}}</td></tr>
                                                            <tr><td>-  Iuran Pekerja 2%</td><td style="text-align:right">{{number_format($oncycle->jpk_pensiunan_iur_pekerja_2, 0, ',', '.')}}</td></tr>
                                                            <tr><td>Jaminan Kesehatan Unit Kesehatan 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_uk_iur_pekerja_1, 0, ',', '.')}}</td></tr>
                                                            <tr><td>Tabungan Hari Tua Taspen</td><td style="text-align:right">{{number_format($oncycle->tht_taspen_iur_pekerja_3_25, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->iur_spka == 0)
                                                            @else
                                                            <tr><td>Potongan Iuran SPKA</td><td style="text-align:right">{{number_format($oncycle->iur_spka, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->pot_sewa_rumah_dinas == 0)
                                                            @else
                                                            <tr><td>Potongan Sewa Rumah Dinas</td><td style="text-align:right">{{number_format($oncycle->pot_sewa_rumah_dinas, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->simpanan_baitul_ridho == 0)
                                                            @else
                                                            <tr><td>Potongan Simpanan Baitul Ridho</td><td style="text-align:right">{{number_format($oncycle->simpanan_baitul_ridho, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->cicilan_baitul_ridho == 0)
                                                            @else
                                                            <tr><td>Potongan Cicilan Baitul Ridho</td><td style="text-align:right">{{number_format($oncycle->cicilan_baitul_ridho, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->total_pajak == 0)
                                                            @else
                                                            <tr><td>Potongan Pajak</td><td style="text-align:right">{{number_format($oncycle->total_pajak, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->admin_oncycle == 0)
                                                            @else
                                                            <tr><td>Admin Bank</td><td style="text-align:right">{{number_format($oncycle->admin_oncycle, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($oncycle->pot_lain == 0)
                                                            @else
                                                            <tr><td>Potongan Lain-lain</td><td style="text-align:right">{{number_format($oncycle->pot_lain, 0, ',', '.')}}</td></tr>                                            </tbody>
                                                            @endif

                                                        @empty
                                                            data kosong
                                                        @endforelse

                                                </table>
                                            </div>
                                        </div>
                                        {{-- total oncycle --}}
                                        <div class="row">
                                            <div class="col-md-3 table-responsive-md ">

                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($offcycles as $offcycle )
                                                            <tr class=" fw-bolder">
                                                                <td class="total table-primary">Total</td>
                                                                <td style="text-align:right" class="total table-primary" >
                                                                {{number_format($total, 0, ',', '.')}}
                                                                </td></tr>
                                                        @empty
                                                            data kosong
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($offcycles as $offcycle )
                                                            <tr class=" fw-bolder">
                                                                <td class="total table-primary">Total</td>
                                                                <td style="text-align:right" class="total table-primary" >
                                                                {{number_format($totalpotongan, 0, ',', '.')}}
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            data kosong
                                                        @endforelse
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        {{-- /total oncycle --}}
                                    </div>
                                </div>
                                {{-- offcycle --}}
                                <div class="tab-pane fade show active" id="pills-ttt" role="tabpanel" aria-labelledby="pills-ttt-tab">
                                    <div class="container mt-2 small">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col mt-2 ">
                                                    <form class="form" method="get" action="{{ route('searchoffcycle') }}">
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
                                            <div class="col-md-3 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($oncycles as $oncycle )
                                                            <tr>
                                                                <th colspan="2" class="table-active" style="width:70%">
                                                                    @forelse ($offcycles as $offcycle)
                                                                    Tunjangan Tidak Tetap : {{$offcycle->bulan}}
                                                                    @empty
                                                                    Penghasilan Bulan :
                                                                    @endforelse
                                                                </th>
                                                            </tr>
                                                            <tr ><td>Nama</td><td>{{$nama}}</td></tr>
                                                            <tr><td>NIPP / NIP</td><td>{{$nip}}</td></tr>
                                                            <tr><td>Jabatan</td><td>{{$oncycle->nama_jabatan}}</td></tr>
                                                            <tr><td>Bank</td><td>{{$oncycle->bank_gaji}}</td></tr>
                                                            <tr><td>No. Rekening</td><td>{{$oncycle->no_rekening}}</td></tr>
                                                            <tr class=" fw-bolder fs-6">
                                                                <td colspan="2" class="total table-primary text-center">Take Home Pay</td>
                                                            </tr>
                                                            @empty
                                                            <p>Data Kosong</p>
                                                        @endforelse

                                                        @forelse ($offcycles as $offcycle )
                                                            @if($offcycle->netpay == 0)
                                                            @else
                                                                <tr class=" fw-bolder fs-6">
                                                                        <td colspan="2" class="total table-primary text-center" > Rp.
                                                                        {{number_format($offcycle->netpay, 0, ',', '.')}}
                                                                        </td>
                                                                </tr>
                                                            @endif

                                                            @if($offcycle->netpaycc121 == 0)
                                                            @else
                                                                <tr class=" fw-bolder fs-6">
                                                                        <td colspan="2" class="total table-primary text-center" > Rp.
                                                                        {{number_format($offcycle->netpaycc121, 0, ',', '.')}}
                                                                        </td>
                                                                </tr>
                                                            @endif

                                                            @empty
                                                            <p>Data Kosong</p>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($offcycles as $offcycle )
                                                            <tr>
                                                                <th colspan="2" class="table-active" style="width:70%">Tunjangan</th>
                                                            </tr>

                                                            @if($offcycle->tunjangan_transport == 0)
                                                            @else
                                                                <tr><td>Tunjangan Transport</td><td style="text-align:right">{{number_format($offcycle->tunjangan_transport, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_komunikasi == 0)
                                                            @else
                                                                <tr><td>Tunjangan Komunikasi</td><td style="text-align:right">{{number_format($offcycle->tunjangan_komunikasi, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_jabatan == 0)
                                                            @else
                                                                <tr><td>Tunjangan Jabatan</td><td style="text-align:right">{{number_format($offcycle->tunjangan_jabatan, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_kinerja_pegawai == 0)
                                                            @else
                                                                <tr><td>Tunjangan Kinerja Pegawai</td><td style="text-align:right">{{number_format($offcycle->tunjangan_kinerja_pegawai, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_kemahalan == 0)
                                                            @else
                                                                <tr><td>Tunjangan Kemahalan</td><td style="text-align:right">{{number_format($offcycle->tunjangan_kemahalan, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_cuti == 0)
                                                            @else
                                                                <tr><td>Tunjangan Cuti</td><td style="text-align:right">{{number_format($offcycle->tunjangan_cuti, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_profesi == 0)
                                                            @else
                                                                <tr><td>Tunjangan Profesi</td><td style="text-align:right">{{number_format($offcycle->tunjangan_profesi, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangn_tidak_tetap_pkwt == 0)
                                                            @else
                                                                <tr><td>Tunjangn Tidak Tetap Pkwt</td><td style="text-align:right">{{number_format($offcycle->tunjangn_tidak_tetap_pkwt, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->tunjangan_keahlian == 0)
                                                            @else
                                                                <tr><td>Tunjangan Keahlian</td><td style="text-align:right">{{number_format($offcycle->tunjangan_keahlian, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->prestasi == 0)
                                                            @else
                                                                <tr><td>Prestasi</td><td style="text-align:right">{{number_format($offcycle->prestasi, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->shift_allowance == 0)
                                                            @else
                                                                <tr><td>Shift Allowance</td><td style="text-align:right">{{number_format($offcycle->shift_allowance, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->best_performance == 0)
                                                            @else
                                                                <tr><td>Best Performance</td><td style="text-align:right">{{number_format($offcycle->best_performance, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @if($offcycle->lembur == 0)
                                                            @else
                                                                <tr><td>Lembur</td><td style="text-align:right">{{number_format($offcycle->lembur, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                            @empty
                                                            <p>Data Kosong</p>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($offcycles as $offcycle )
                                                            <tr>
                                                                <th colspan="2" class="table-active" style="width:70%">Potongan</th>
                                                            </tr>

                                                            @if($offcycle->potongan_lain == 0)
                                                            @else
                                                                <tr><td>Potongan Lain</td><td style="text-align:right">{{number_format($offcycle->potongan_lain, 0, ',', '.')}}</td></tr>
                                                            @endif
                                                                <tr><td>Admin Bank</td><td style="text-align:right">{{number_format($offcycle->admin_bank, 0, ',', '.')}}</td></tr>
                                                            @if($offcycle->penalty == 0)
                                                            @else
                                                                <tr><td>Penalty</td><td style="text-align:right">{{number_format($offcycle->penalty, 0, ',', '.')}}</td></tr>
                                                            @endif

                                                        @empty
                                                            data kosong
                                                        @endforelse

                                                </table>
                                            </div>
                                        </div>

                                        {{-- total --}}
                                        <div class="row">
                                            <div class="col-md-3 table-responsive-md ">

                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($offcycles as $offcycle )
                                                            @if($offcycle->bruto == 0)
                                                            @else
                                                                <tr class=" fw-bolder">
                                                                    <td class="total table-primary">Total</td>
                                                                    <td style="text-align:right" class="total table-primary" >
                                                                    {{number_format($offcycle->bruto, 0, ',', '.')}}
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            @if($offcycle->netpaycc121 == 0)
                                                            @else
                                                                <tr class=" fw-bolder">
                                                                <td class="total table-primary">Total</td>
                                                                    <td style="text-align:right" class="total table-primary" >
                                                                    {{number_format($totaloffcyclecc121, 0, ',', '.')}}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @empty
                                                            data kosong
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        @forelse ($offcycles as $offcycle )
                                                                <tr class=" fw-bolder">
                                                                        <td class="total table-primary">Total</td>
                                                                        <td style="text-align:right" class="total table-primary" >
                                                                        {{number_format($totalpotonganoffcycle, 0, ',', '.')}}
                                                                        </td>
                                                                    </tr>

                                                        @empty
                                                            data kosong
                                                        @endforelse
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
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

@push('after-script')
<script type="text/javascript">
  document.getElementById('search').value = "<?php echo $_GET['search'];?>";

</script>
@endpush
