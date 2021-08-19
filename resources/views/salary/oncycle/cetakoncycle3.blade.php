@extends('user.salary')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/cetakslip.min.css') }}">
@endpush

@section('oncycle')
<main>
    <div class="col-md" id="slip-page">
        <table class="table table-borderless p-0 table-sm mb-0">
            <tr>
                <td style="text-align:right;" colspan="3">
                    <img src="{{ asset('images/logo1.png') }}" width="auto" height="85px"/>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center" class=" fw-bolder fs-5">
                    SLIP PENGHASILAN
                </td>
            </tr>
        </table>
        <div class="card-body py-0 px-0">
            <table class=" card-body table table-bordered mx-0 my-0 p-0 table-sm">
                <tr class="card-header border fw-bolder text-center fs-6">
                    <td colspan="6" >
                        Upah Pokok Tunjangan Tetap
                    </td>
                </tr>
                <tr>
                    <td>Nama</td><td>{{$oncycles->nama}}</td>               <td rowspan="3"></td>   <td>Bank</td><td>{{$oncycles->bank_gaji}}</td>    <td rowspan="4"  style="text-align: center"> <img class="qrcode" src="{{ asset('qrcode/'. $nip . '-oncycle-' . $keyword . '.svg' ) }}" height="90px"></td>
                <tr>
                    <td>NIPP / NIP</td><td>{{$oncycles->nip}}</td>                                  <td>No. Rekening</td><td>{{$oncycles->no_rekening}}</td>
                </tr>
                <tr>
                    <td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td>                            <td>No. NPWP</td><td>{{$employee->npwp}}</td>
                </tr>
                <tr class="card-header fw-bolder">
                    <td colspan="3"></td>
                    <td>Take Home Pay</td>
                    <td> Rp.
                {{number_format($oncycles->netpay, 0, ',', '.')}}
                </td>
                </tr>
            </table>
        </div>
        <table class="table table-bordered mt-0 py-0 px-0 mt-3">
            <tbody>
            <tr>
                <td class="p-0">
                    <div class="card-header border m-0 fw-bolder">Upah Pokok Tunjangan Tetap</div>
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
                </td>
                <td>

                </td>
                <td class="p-0">
                    <div class="card-header fw-bolder">Potongan</div>
                    <table class="card-body table border border-black table-sm mb-0">
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
                </td>
            </tr>
            <tr>
                <td class="p-0">
                    <table class="card-footer table border border-black mb-0">
                        <tr class=" fw-bolder">
                            <td >Total</td>
                            <td style="text-align:right" >
                            {{number_format($total, 0, ',', '.')}}
                            </td>
                        </tr>
                    </table>
                </td>
                <td></td>
                <td  class="p-0">
                    <table class="card-footer table border border-black mb-0">
                        <tr class=" fw-bolder">
                            <td >Total</td>
                            <td style="text-align:right"  >
                            {{number_format($totalpotongan, 0, ',', '.')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>

        </table>
        <div style="width: 100%; text-align: center; font-style: italic; font-size: 90%;">
                Slip Penghasilan ini di generate otomatis secara elektronik pada tanggal {{ $salaryslip->created_at->isoFormat('DD MMMM YYYY HH:mm:ss') }} dengan Aplikasi eoffice KA Pariwisata, scan qrcode untuk memastikan keaslian dokumen
        </div>
    </div>
</main>

@endsection
