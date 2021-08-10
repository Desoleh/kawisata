@extends('user.salary')

@section('oncycle')

<div class="row">
    <div class="col-md table-responsive-md py">
        <div class="card-header bg-primary text-white">
            Upah Pokok Tunjangan Tetap : {{$oncycles->bulan}}
        </div>
        <table class=" card-body table border border-black table-sm mb-0">
            <tbody>
                <tr><td>Nama</td><td>{{$oncycles->nama}}</td></tr>
                <tr><td>NIPP/NIP</td><td>{{$oncycles->nip}}</td></tr>
                <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                <tr><td>Bank</td><td>{{$oncycles->bank_gaji}}</td></tr>
                <tr><td>No. Rekening</td><td>{{$oncycles->no_rekening}}</td></tr>
                <tr><td>No. NPWP</td><td>{{$employee->npwp}}</td></tr>
            </tbody>
        </table>
        <table class="card-footer border table table-borderless">
            <tr class=" fw-bolder fs-6 pb-1">
                <td >Take Home Pay</td>
                <td style="text-align:right"> Rp.
                {{number_format($oncycles->netpay, 0, ',', '.')}}
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md table-responsive-md ">
        <div class="card-header bg-primary text-white">
            Upah dan Tunjangan Tetap
        </div>
        <table class=" card-body table border border-black table-sm mb-0">
            <tbody>
                @if($oncycles->upah_pokok == 0)
                @else
                <tr><td>Upah Pokok</td><td style="text-align:right">{{number_format($oncycles->upah_pokok, 0, ',', '.')}}</td></tr>
                @endif

                @if($oncycles->honorarium_pkwt == 0)
                @else
                <tr><td>Upah Pokok</td><td style="text-align:right">{{number_format($oncycles->honorarium_pkwt, 0, ',', '.')}}</td></tr>
                @endif

                <tr><td colspan="2" style="font-weight: 500">Tunjangan Tetap :</td></tr>

                @if($oncycles->tunj_perumahan  == 0)
                @else
                <tr><td>-  Tunjangan Perumahan</td><td style="text-align:right">{{number_format($oncycles->tunj_perumahan, 0, ',', '.')}}</td></tr>
                @endif

                @if($oncycles->tunj_adm_bank  == 0)
                @else
                <tr><td>-  Tunjangan Administrasi Bank</td><td style="text-align:right">{{number_format($oncycles->tunj_adm_bank, 0, ',', '.')}}</td></tr>
                @endif

                <tr><td colspan="2" style="font-weight: 500">Jaminan Sosial Ketenagakerjaan BPJS :</td></tr>
                <tr><td>-  Jaminan Hari Tua 3,7%</td><td style="text-align:right">{{number_format($oncycles->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td></tr>
                <tr><td>-  Jaminan Pensiun 2%</td><td style="text-align:right">{{number_format($oncycles->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td></tr>
                <tr><td>-  Jaminan Kecelakaan Kerja 1,27%</td><td style="text-align:right">{{number_format($oncycles->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td></tr>
                <tr><td>-  Jaminan Kematian 0,3%</td><td style="text-align:right">{{number_format($oncycles->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td></tr>

                @if($oncycles->jht_jwasraya_iur_persh_12_5  == 0)
                @else
                <tr><td>Jaminan Hari Tua Jiwasraya 12,5%</td><td style="text-align:right">{{number_format($oncycles->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td></tr>
                @endif

                <tr><td colspan="2" style="font-weight: 500">Jaminan Pemeliharaan Kesehatan (JPK)</td></tr>

                @if($oncycles->jpk_bpjs_mand_iur_persh  == 0)
                @else
                <tr><td>-  JPK BPJS 4%</td><td style="text-align:right">{{number_format($oncycles->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td></tr>
                @endif

                @if($oncycles->jpk_bpjs_iur_persh_4  == 0)
                @else
                <tr><td>-  JPK BPJS 4%</td><td style="text-align:right">{{number_format($oncycles->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
                @endif

                @if($oncycles->jpk_pensiunan_iur_persh_2  == 0)
                @else
                <tr><td>-  JPK Pensiunan 2%</td><td style="text-align:right">{{number_format($oncycles->jpk_pensiunan_iur_persh_2, 0, ',', '.')}}</td></tr>
                @endif

                @if($oncycles->total_pajak  == 0)
                @else
                <tr><td>Tunjangan Pajak</td><td style="text-align:right">{{number_format($oncycles->total_pajak, 0, ',', '.')}}</td></tr>
                @endif

                @if($oncycles->tunj_kurang_bayar  == 0)
                @else
                <tr><td>Tunjangan Kekurangan Bayar</td><td style="text-align:right">{{number_format($oncycles->tunj_kurang_bayar, 0, ',', '.')}}</td></tr>
                @endif
            </tbody>
        </table>
        <table class="card-footer border table table-borderless">
            <tr class=" fw-bolder">
                <td >Total</td>
                <td style="text-align:right" >
                {{number_format($total, 0, ',', '.')}}
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md table-responsive-md">
        <div class="card-header bg-primary text-white">
            Potongan
        </div>
        <table class="table border border-black table-sm mb-0">
            <tbody>
            @if($oncycles->jht_jwasraya_iur_persh_12_5 == 0)
            @else
            <tr><td colspan="2" style="font-weight: 500">Jaminan Hari Tua Jiwasraya :</td></tr>
            <tr><td>-  Iuran Perusahaan 12,5%</td><td style="text-align:right">{{number_format($oncycles->jht_jwasraya_iur_persh_12_5, 0, ',', '.')}}</td></tr>
            <tr><td>-  Iuran Pekerja 4,75%</td><td style="text-align:right">{{number_format($oncycles->jht_jwasraya_iur_pekerja_4_75, 0, ',', '.')}}</td></tr>
            @endif
            <tr><td colspan="2" style="font-weight: 500">Jaminan Hari Tua BPJS Ketenagakerjaan :</td></tr>
            <tr><td>-  Iuran Perusahaan 3,7%</td><td style="text-align:right">{{number_format($oncycles->jht_bpjs_iur_persh_3_7, 0, ',', '.')}}</td></tr>
            <tr><td>-  Iuran Pekerja 2%</td><td style="text-align:right">{{number_format($oncycles->jht_bpjs_iur_pekerja_2, 0, ',', '.')}}</td></tr>
            <tr><td colspan="2" style="font-weight: 500">Jaminan Pensiun BPJS Ketenagakerjaan :</td></tr>
            <tr><td>-  Iuran Perusahaan 2%</td><td style="text-align:right">{{number_format($oncycles->jp_bpjs_iur_persh_2, 0, ',', '.')}}</td></tr>
            <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycles->jp_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
            <tr><td>Jaminan Kecelakaan Kerja BPJS 1,27%</td><td style="text-align:right">{{number_format($oncycles->jkk_bpjs_iur_persh_1_27, 0, ',', '.')}}</td></tr>
            <tr><td>Jaminan Kematian BPJS 0,3%</td><td style="text-align:right">{{number_format($oncycles->jk_bpjs_iur_persh_0_3, 0, ',', '.')}}</td></tr>

            @if($oncycles->jpk_bpjs_mand_iur_persh == 0)
            @else
            <tr><td colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Mandiri-PKWT) :</td></tr>
            <tr><td>-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycles->jpk_bpjs_mand_iur_persh, 0, ',', '.')}}</td></tr>
            <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycles->jpk_bpjs_mand_iur_pekerja, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->jpk_bpjs_iur_persh_4 == 0)
            @else
            <tr><td colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Perbantuan) :</td></tr>
            <tr><td>-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycles->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
            <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycles->jpk_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->iur_spka == 0)
            @else
            <tr><td>Potongan Iuran SPKA</td><td style="text-align:right">{{number_format($oncycles->iur_spka, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->pot_sewa_rumah_dinas == 0)
            @else
            <tr><td>Potongan Sewa Rumah Dinas</td><td style="text-align:right">{{number_format($oncycles->pot_sewa_rumah_dinas, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->simpanan_baitul_ridho == 0)
            @else
            <tr><td>Potongan Simpanan Baitul Ridho</td><td style="text-align:right">{{number_format($oncycles->simpanan_baitul_ridho, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->cicilan_baitul_ridho == 0)
            @else
            <tr><td>Potongan Cicilan Baitul Ridho</td><td style="text-align:right">{{number_format($oncycles->cicilan_baitul_ridho, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->total_pajak == 0)
            @else
            <tr><td>Potongan Pajak</td><td style="text-align:right">{{number_format($oncycles->total_pajak, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->admin_oncycle == 0)
            @else
            <tr><td>Admin Bank</td><td style="text-align:right">{{number_format($oncycles->admin_oncycle, 0, ',', '.')}}</td></tr>
            @endif

            @if($oncycles->pot_lain == 0)
            @else
            <tr><td>Potongan Lain-lain</td><td style="text-align:right">{{number_format($oncycles->pot_lain, 0, ',', '.')}}</td></tr>                                            </tbody>
            @endif
        </table>
        <table class="card-footer border table table-borderless">
            <tr class=" fw-bolder">
                <td >Total</td>
                <td style="text-align:right"  >
                {{number_format($totalpotongan, 0, ',', '.')}}
                </td>
            </tr>
        </table>

    </div>
</div>

@endsection
