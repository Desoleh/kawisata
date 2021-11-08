<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="msapplication-TileColor" content="#43A047" />
    <meta name="theme-color" content="#43A047" />

    <title>A4 page</title>


    <style>
      /* Font and bg color */
      body {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 300;
        font-size: 0.87em; /* 0.81em is looking good */
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        background: white;
        margin: 0;
      }
      * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }

      /* Main page layout an styles */
      .page {
        display: block;
        background: white;
        width: 100%;
      }
      article {
        width: 100%;
        height: 100%;
        padding: 16px 16px 72px 16px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
      }

      /* Large mode (common for screen and print) */
      @media print, screen and (min-width: 1024px) {
        article {
          padding: 14mm 17mm;
        }
      }

      /* Large screens */
      @media screen and (min-width: 1024px) {
        body {
          background-color: rgb(204, 204, 204);
        }
        .page {
          width: 210mm;
          height: 297mm;
          margin: 5mm auto;
          -webkit-box-shadow: 0 0 5mm rgba(0, 0, 0, 0.5);
          box-shadow: 0 0 5mm rgba(0, 0, 0, 0.5);
        }
      }

      /* Print mode */
      @media print {
        .page {
          height: 296.6mm; /* Firefox weirdness: if set to 297mm, you get 2 pages... */
          margin: 0;
          -webkit-box-shadow: 0;
          box-shadow: 0;
        }
        .btn-round {
          display: none !important;
        }
      }

      @page {
        size: A4;
        margin: 0mm;
      }

      /* Buttons */
      .noselect {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Standard */
      }
      .btn-round {
        cursor: pointer;
        background-color: #019da9;
        border-radius: 999em;
        width: 56px;
        height: 56px;
        line-height: 1;
        font-size: 36px;
        position: relative;
        cursor: pointer;
        display: inline-block;
        transition: 0.2s;
        transition-delay: 0.2s;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14),
          0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
      }

      .btn-round svg {
        pointer-events: none;
        position: absolute;
        display: block;
        top: 16px;
        left: 16px;
        height: 24px;
        width: 24px;
        fill: white;
      }
      .btn-round:active {
        transition-delay: 0s;
        box-shadow: 0 8px 10px 1px rgba(0, 0, 0, 0.14),
          0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.4);
      }
      .btn-round.white {
        background-color: white;
      }
      .btn-round.white svg {
        fill: #019da9;
      }

      /* Buttons - Specific */
      .btn-print {
        display: none;
        position: fixed;
        right: 16px;
        bottom: 16px;
      }
      .btn-download {
        position: fixed;
        right: 16px;
        bottom: 76px;
      }

      /* Error message */
      #error {
        display: none;
        padding: 3em;
      }
      #error h1 {
        text-align: center;
        font-weight: 300;
        font-size: 1.5rem;
        line-height: 2rem;
      }
    </style>
        <link rel="stylesheet" href="{{ asset('css/styles-slip.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cetakslip-only.min.css') }}">

  </head>
  <body>
    <div id="cv">
      <div class="page">
            <article>
                <main>
                    <div class="col-md" id="slip-page">
                        <table class="table table-borderless p-0 table-sm mb-0">
                            <tr>
                                <td style="text-align:right;" colspan="3">
                                    <img class="logo" src="{{ asset('images/logo1.png') }}" width="auto" height="85px"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center" class=" fw-bolder fs-5">
                                    SLIP GAJI
                                </td>
                            </tr>
                        </table>
                        <div class="card-body py-0 px-0">
                            <table class=" card-body table table-bordered mx-0 my-0 p-0 table-sm">
                                <tr class="card-header border fw-bolder text-center fs-6">
                                    <td colspan="6" >
                                        Upah Pokok & Tunjangan Tetap
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td><td>{{$oncycles->nama}}</td>
                                    <td rowspan="4"></td>   <td>Bank</td><td>{{$oncycles->bank_gaji}}</td>
                                    <td rowspan="4"  style="text-align: center; vertical-align: middle;">
                                    <img class="qrcode" src="{{ asset('storage/qrcode/'. $nip . '-oncycle-' . $keyword . '.svg' ) }}" height="90px"></td>
                                <tr>
                                    <td>NIPP / NIP</td><td>{{$oncycles->nip}}</td>
                                    <td>No. Rekening</td><td>{{$oncycles->no_rekening}}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td>
                                    <td>No. NPWP</td><td>{{$employee->npwp}}</td>
                                </tr>
                                <tr class="card-header fw-bolder">
                                    <td>Bulan</td><td>{{$keyword}}</td>
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
                                    <div class="card-header border m-0 fw-bolder">Upah Pokok & Tunjangan Tetap</div>
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
                                Slip Gaji ini di generate otomatis secara elektronik pada tanggal {{ $salaryslip->created_at->isoFormat('DD MMMM YYYY HH:mm:ss') }} dengan Aplikasi eoffice KA Pariwisata, scan qrcode untuk memastikan keaslian dokumen
                        </div>
                    </div>
                </main>
            </article>
      </div>
      <div id="btnPrint" title="Print…" class="btn-round btn-print noselect">
        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet">
          <g>
            <path
              d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"
            ></path>
          </g>
        </svg>
      </div>
      <a href="{{ URL::previous() }}" id="btnDownload" title="Print…" class="btn-round btn-download noselect">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
      </a>

    </div>
    <div id="error">
      <h1>
        You must use a modern browser to view this page.<br />
        If you do not have one, please choose
        <a href="https://whatbrowser.org" target="_blank">over here</a>.
      </h1>
    </div>

    <script type="text/javascript" src="{{ asset('js/ua-parser.min.js') }}"></script>
    <script type="text/javascript">
      (function () {
        var result = new UAParser().getResult();
        if (result.browser.name === "IE") {
          // Unsupported browsers
          document.getElementById("cv").style.display = "none";
          document.getElementById("error").style.display = "block";
        }
        if (result.browser.name !== "Safari" && !result.device.type) {
          // Problematic print
          document.getElementById("btnPrint").style.display = "block";
        }
        document.getElementById("btnPrint").onclick = function () {
          window.print();
        };
      })();
    </script>
  </body>
</html>


