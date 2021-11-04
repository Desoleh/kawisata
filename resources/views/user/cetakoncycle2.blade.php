<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- <link href="{{asset('bootstrap/5.0/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/cetak.css')}}">


    {{-- <link rel="stylesheet" href="{{ asset('css/cetak.css')}}"> --}}
    </head>
    <body>
        <?php
        $nip = $salaryslip->nip;
        $monthyear = $salaryslip->monthyear;
        // dd($uuid);
         ?>

        <div class="container"></div>
        <div id="title">
            <h5 style="text-align: center; font-weight: bold; "> <strong>Slip Gaji</strong></h5>
        </div>
                <main>
                    <div class="container" id="memo-page">
                        <table class="table table-borderless small">
                            <tr>
                                <td style="text-align:right;" colspan="2">
                                    <img src="{{ asset('images/logo1.png') }}" width="auto" height="92px"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center" class=" fw-bolder fs-4">
                                    SLIP GAJI
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                        <div class="card-header fw-bolder text-center">
                                            Upah Pokok & Tunjangan Tetap
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                        <tr><td>Nama</td><td>{{$oncycles->nama}}</td>
                                                        </tr>
                                                        <tr><td>NIPP / NIP</td><td>{{$oncycles->nip}}</td></tr>
                                                        <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                        <tr><td>Bank</td><td>{{$oncycles->bank_gaji}}</td></tr>
                                                        <tr><td>No. Rekening</td><td>{{$oncycles->no_rekening}}</td></tr>
                                                        <tr><td>No. NPWP</td><td>{{$employee->npwp}}</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-header">Upah Pokok & Tunjangan Tetap</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                        <tr><td>Nama</td><td>{{$oncycles->nama}}</td>
                                                        </tr>
                                                        <tr><td>NIPP / NIP</td><td>{{$oncycles->nip}}</td></tr>
                                                        <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <div class="card-header">Upah Pokok & Tunjangan Tetap</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                        <tr><td>Nama</td><td>{{$oncycles->nama}}</td>
                                                        </tr>
                                                        <tr><td>NIPP / NIP</td><td>{{$oncycles->nip}}</td></tr>
                                                        <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                                                        <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-footer">Jumlah</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <div class="card-footer">Jumlah</div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-header">Upah Pokok & Tunjangan Tetap</div>
                                        <div class="card-body">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <table class="table">
                                                            <tbody>
                                                                    <tr><td>Nama</td><td>{{$oncycles->nama}}</td>
                                                                    </tr>
                                                                    <tr><td>NIPP / NIP</td><td>{{$oncycles->nip}}</td></tr>
                                                                    <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <table class="table">
                                                            <tbody>
                                                                    <tr><td>Nama</td><td>{{$oncycles->nama}}</td>
                                                                    </tr>
                                                                    <tr><td>NIPP / NIP</td><td>{{$oncycles->nip}}</td></tr>
                                                                    <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tfoot>
                            <tr>
                                <td>
                                        <!--place holder for the fixed-position footer-->
                                        <div class="page-footer-space"></div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="page-footer" style="width: 100%; text-align: center; font-style: italic; font-size: 90%;">
                            Memo Internal ini telah di tandatangani secara elektronik
                            menggunakan Aplikasi Memo Internal KA Pariwisata
                            oleh VP Corporate Communication | IRFAN SOBARI | NIPP/NIP 11790011 pada 3 Agustus 2021, 23:41
                        </div>
                        </div>
                </main>

            {{-- <table  class="table1" >
                <thead>
                    <tr>
                            <th colspan="3" class="table-active" style="text-align:center;">
                                @forelse ($oncycles as $oncycle)
                                Upah Pokok & Tunjangan Tetap : {{$oncycles->bulan}}
                                @empty
                                Upah Pokok & Tunjangan Tetap :
                                @endforelse
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td valign="top">
                            <table>
                                <tbody>
                                    @forelse ($oncycles as $oncycle )
                                        <tr><td id="1">Nama</td><td>{{$oncycle->nama}}</td>
                                        </tr>
                                        <tr><td id="1">NIPP / NIP</td><td>{{$oncycle->nip}}</td></tr>
                                        <tr><td id="1">Jabatan</td><td>{{$oncycle->nama_jabatan}}</td></tr>
                                </tbody>
                            </table>
                        </td>
                        <td>

                        </td>
                        <td>
                            <table >
                                <tbody>
                                        <tr><td>Bank</td><td>{{$oncycle->bank_gaji}}</td></tr>
                                        <tr><td>No. Rekening</td><td>{{$oncycle->no_rekening}}</td></tr>
                                        <tr><td>No. NPWP</td><td>{{$employee->npwp}}</td></tr>
                                        <tr class=" fw-bolder fs-6">
                                            <th colspan="2" class="text-center table-active ">Take Home Pay</th>
                                        </tr>
                                        <tr class=" fw-bolder fs-6">
                                                <th colspan="2" class="text-center table-active" > Rp.
                                                {{number_format($oncycle->netpay, 0, ',', '.')}}
                                                </td>
                                        </tr>
                                    @empty
                                        <p>Data Kosong</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table> --}}
            <br>
                {{-- <table class="table1" >
                    <tr>
                        <td valign="top">
                            <table>
                                <tbody>
                                    @forelse ($oncycles as $oncycle )
                                    <tr>
                                        <th colspan="2" class="table-active" style="width:70%">Upah dan Tunjangan</th>
                                    </tr>
                                        @if($oncycle->upah_pokok == 0)
                                        @else
                                        <tr><td id="1">Upah Pokok</td><td style="text-align:right">{{number_format($oncycle->upah_pokok, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->honorarium_pkwt == 0)
                                        @else
                                        <tr><td id="1">Upah Pokok</td><td style="text-align:right">{{number_format($oncycle->honorarium_pkwt, 0, ',', '.')}}</td></tr>
                                        @endif

                                        <tr><td id="1" colspan="2" style="font-weight: 500">Tunjangan Tetap :</td></tr>

                                        @if($oncycle->tunj_perumahan  == 0)
                                        @else
                                        <tr><td id="1">-  Tunjangan Perumahan</td><td style="text-align:right">{{number_format($oncycle->tunj_perumahan, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->tunj_adm_bank  == 0)
                                        @else
                                        <tr><td id="1">-  Tunjangan Administrasi Bank</td><td style="text-align:right">{{number_format($oncycle->tunj_adm_bank, 0, ',', '.')}}</td></tr>
                                        @endif

                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Sosial Ketenagakerjaan BPJS :</td></tr>
                                        <tr><td id="1">-  Jaminan Hari Tua 3,7%</td><td style="text-align:right">{{number_format($oncycle->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Jaminan Pensiun 2%</td><td style="text-align:right">{{number_format($oncycle->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Jaminan Kecelakaan Kerja 1,27%</td><td style="text-align:right">{{number_format($oncycle->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Jaminan Kematian 0,3%</td><td style="text-align:right">{{number_format($oncycle->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td></tr>

                                        @if($oncycle->jht_jwasraya_iur_persh_12_5  == 0)
                                        @else
                                        <tr><td id="1">Jaminan Hari Tua Jiwasraya 12,5%</td><td style="text-align:right">{{number_format($oncycle->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td></tr>
                                        @endif

                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Pemeliharaan Kesehatan (JPK)</td></tr>

                                        @if($oncycle->jpk_bpjs_mand_iur_persh  == 0)
                                        @else
                                        <tr><td id="1">-  JPK BPJS 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->jpk_bpjs_iur_persh_4  == 0)
                                        @else
                                        <tr><td id="1">-  JPK BPJS 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->jpk_pensiunan_iur_persh_2  == 0)
                                        @else
                                        <tr><td id="1">-  JPK Pensiunan 2%</td><td style="text-align:right">{{number_format($oncycle->jpk_pensiunan_iur_persh_2, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->total_pajak  == 0)
                                        @else
                                        <tr><td id="1">Tunjangan Pajak</td><td style="text-align:right">{{number_format($oncycle->total_pajak, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->tunj_kurang_bayar  == 0)
                                        @else
                                        <tr><td id="1">Tunjangan Kekurangan Bayar</td><td style="text-align:right">{{number_format($oncycle->tunj_kurang_bayar, 0, ',', '.')}}</td></tr>
                                        @endif

                                    @empty
                                    <p>Data Kosong</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </td>
                        <td>

                        </td>
                        <td>
                            <table >
                                <tbody>
                                    @forelse ($oncycles as $oncycle )
                                        <tr>
                                            <th colspan="2" class="table-active" style="width:70%">Potongan</th>
                                        </tr>

                                        @if($oncycle->jht_jwasraya_iur_persh_12_5 == 0)
                                        @else
                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Hari Tua Jiwasraya :</td></tr>
                                        <tr><td id="1">-  Iuran Perusahaan 12,5%</td><td style="text-align:right">{{number_format($oncycle->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Iuran Pekerja 4,75%</td><td style="text-align:right">{{number_format($oncycle->jht_jwasraya_iur_pekerja_4_75, 0, ',', '.')}}</td></tr>
                                        @endif

                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Hari Tua BPJS Ketenagakerjaan :</td></tr>
                                        <tr><td id="1">-  Iuran Perusahaan 3,7%</td><td style="text-align:right">{{number_format($oncycle->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Iuran Pekerja 2%</td><td style="text-align:right">{{number_format($oncycle->jht_bpjs_iur_pekerja_2, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Pensiun BPJS Ketenagakerjaan :</td></tr>
                                        <tr><td id="1">-  Iuran Perusahaan 2%</td><td style="text-align:right">{{number_format($oncycle->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jp_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">Jaminan Kecelakaan Kerja BPJS 1,27%</td><td style="text-align:right">{{number_format($oncycle->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">Jaminan Kematian BPJS 0,3%</td><td style="text-align:right">{{number_format($oncycle->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td></tr>



                                        @if($oncycle->jpk_bpjs_mand_iur_persh == 0)
                                        @else
                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Mandiri-PKWT) :</td></tr>
                                        <tr><td id="1">-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_pekerja, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->jpk_bpjs_iur_persh_4 == 0)
                                        @else
                                        <tr><td id="1" colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Perbantuan) :</td></tr>
                                        <tr><td id="1">-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
                                        <tr><td id="1">-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->iur_spka == 0)
                                        @else
                                        <tr><td id="1">Potongan Iuran SPKA</td><td style="text-align:right">{{number_format($oncycle->iur_spka, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->pot_sewa_rumah_dinas == 0)
                                        @else
                                        <tr><td id="1">Potongan Sewa Rumah Dinas</td><td style="text-align:right">{{number_format($oncycle->pot_sewa_rumah_dinas, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->simpanan_baitul_ridho == 0)
                                        @else
                                        <tr><td id="1">Potongan Simpanan Baitul Ridho</td><td style="text-align:right">{{number_format($oncycle->simpanan_baitul_ridho, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->cicilan_baitul_ridho == 0)
                                        @else
                                        <tr><td>Potongan Cicilan Baitul Ridho</td><td style="text-align:right">{{number_format($oncycle->cicilan_baitul_ridho, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->total_pajak == 0)
                                        @else
                                        <tr><td id="1">Potongan Pajak</td><td style="text-align:right">{{number_format($oncycle->total_pajak, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->admin_oncycle == 0)
                                        @else
                                        <tr><td id="1">Admin Bank</td><td style="text-align:right">{{number_format($oncycle->admin_oncycle, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($oncycle->pot_lain == 0)
                                        @else
                                        <tr><td id="1">Potongan Lain-lain</td><td style="text-align:right">{{number_format($oncycle->pot_lain, 0, ',', '.')}}</td></tr>                                            </tbody>
                                        @endif

                                    @empty
                                        data kosong
                                    @endforelse

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr class=" fw-bolder active">
                                    <th class="table-active" width="210px">Total</th>
                                    <th style="text-align:right" class="total table-primary" width="30%" >
                                    {{number_format($total, 0, ',', '.')}}
                                    </th>
                                </tr>
                            </table>
                        </td>
                        <td width="10px">

                        </td>
                        <td>
                            <table>
                                <tr class=" table-active">
                                    <th class="table-active" width="210px">Total</th>
                                    <th style="text-align:right" class="total table-primary" width="30%">
                                    {{number_format($totalpotongan, 0, ',', '.')}}
                                    </th>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table> --}}
            <br>
            <div style="margin-left:325px">
                <table class="table2" >
                    <tr>
                        <td  class="text-center" width="50%">Bandung,  {{ $today->isoFormat('DD MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td  class="text-center" width="50%">Manager Human Capital</td>
                    </tr>
                    <br>
                    <tr>
                        <td  class="text-center" width="50%"><img class="qrcode" src="{{ asset('qrcode/'. $nip . '-oncycle-' . $monthyear . '.svg' ) }}" height="75px"></td>
                    </tr>
                    <br>
                    <tr>
                        <td class="text-center" width="50%">Muchamad Soleh</td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>

