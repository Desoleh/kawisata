<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
    $img = $document->photo;
 ?>
@extends('user.salary')
@push('after-style')
    <style>
        body {padding:30px}
        .print-area {border:1px solid red;padding:1em;margin:0 0 1em}

        #logo img {
        width: 100%;
        height: auto;

        }

        .container {
            margin-top: 5px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;

        }

        table, td, th {
        border: 0.5px solid rgb(95, 95, 95);
        }

        table {
        width: 100%;
        border-collapse: collapse;
        }

        .container .topright {
        /* position: fixed;  ; */
        top: 0px;
        left: 67%;
        width: auto;
        }

        .container .fixbottom {
        position: absolute;
        /* top: 930px; */
        width: 100%;
        left: 0px;
        /* bottom: 10px; */
        height: auto;
        }

        .container .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 256mm;
        outline: 2cm #FFEAEA solid;
        }

        @page {
        size: A4;
        margin: 0;
        }

        @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
        }

    </style>
@endpush
@section('oncycle')
    <?php
    // dd($oncycles);
    $nama = $employee->nama;
    $nip = $employee->nip;
        $img = $document->photo;

 ?>

<div class="modal fade" id="cetak" tabindex="-1" aria-labelledby="cetakLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        <a href="javascript:printDiv('print-area-1');" class="btn btn-primary" type="button" >Print</a>
      </div>

      <div class="modal-body">
        <div id="print-area-1" class="print-area page">
            <div class="container">
                <div style="text-align: center;">
                    <img class="topright" src="{{asset('images/logo1.png')}}" style="height: 95px" id="logo">
                    <h3> <strong>  Slip Penghasilan</strong></h3>
                    <div class="row">
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
                    <br>
                    <div class="row">
                        <div class="column">

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

                </div>
                <img class="fixbottom" src="{{asset('images/kopsurat.png')}}" style="width: 793px">

            </div>
            {{-- batas container --}}
        </div>
        <textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
        <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
      </div>
    </div>
  </div>
</div>

@endsection

@push('after-scrpt')
<script>
     function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
@endpush