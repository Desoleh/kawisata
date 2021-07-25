@extends('user.salary')

@section('oncycle')
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
                    <tr><td>Nama</td><td>{{$oncycle->nama}}</td></tr>
                    <tr><td>NIPP/NIP</td><td>{{$oncycle->nip}}</td></tr>
                    <tr><td>Jabatan</td><td>{{$oncycle->nama_jabatan}}</td></tr>
                    <tr><td>Bank</td><td>{{$oncycle->bank_gaji}}</td></tr>
                    <tr><td>No. Rekening</td><td>{{$oncycle->no_rekening}}</td></tr>
                    <tr><td>No. NPWP</td><td>{{$employee->npwp}}</td></tr>
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

                        <tr class=" fw-bolder">
                            <td class="total table-primary">Total</td>
                            <td style="text-align:right" class="total table-primary" >
                            {{number_format($total, 0, ',', '.')}}
                            </td>
                        </tr>

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
                        <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_mand_iur_pekerja, 0, ',', '.')}}</td></tr>
                        @endif

                        @if($oncycle->jpk_bpjs_iur_persh_4 == 0)
                        @else
                        <tr><td colspan="2" style="font-weight: 500">Jaminan Kesehatan BPJS Kesehatan (Perbantuan) :</td></tr>
                        <tr><td>-  Iuran Perusahaan 4%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_persh_4, 0, ',', '.')}}</td></tr>
                        <tr><td>-  Iuran Pekerja 1%</td><td style="text-align:right">{{number_format($oncycle->jpk_bpjs_iur_pekerja_1, 0, ',', '.')}}</td></tr>
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
                        <tr class=" fw-bolder">
                            <td class="total table-primary">Total</td>
                            <td style="text-align:right" class="total table-primary" >
                            {{number_format($totalpotongan, 0, ',', '.')}}
                            </td>
                        </tr>
            </table>
        </div>
    </div>

@endsection
