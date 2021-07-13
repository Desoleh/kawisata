<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}

.column {
  float: left;
  width: 45%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
<div class="container">

<h2>Tables Side by Side</h2>
<p>How to create side-by-side tables with CSS:</p>

        <div class="row">
            <div class="column">

                <table class="table ">
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
            <div class="column">
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

</body>
</html>

