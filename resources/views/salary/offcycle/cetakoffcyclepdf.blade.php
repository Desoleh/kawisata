<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">
        <title>@yield('title')</title>
        <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        @stack('style-before')
        <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
        <script src="https://kit.fontawesome.com/8e44ec7106.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/cetakslip.min.css') }}">
    </head>
<body>
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
                        <td colspan="6">
                            Tunjangan Tidak Tetap
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td><td>{{$oncycles->nama}}</td>
                        <td rowspan="4"></td>
                        <td>Bank</td><td>{{$oncycles->bank_gaji}}</td>
                        <td rowspan="4"  style="text-align: center; vertical-align: middle;">
                        <img class="qrcode" src="{{ asset('qrcode/'. $nip . '-offcycle-' . $keyword . '.svg' ) }}" height="90px"></td>
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
                        @if($offcycles->netpay == 0)
                        @else
                                <td >Take Home Pay</td>
                                <td > Rp.
                                {{number_format($offcycles->netpay, 0, ',', '.')}}
                                </td>
                        @endif

                        @if($offcycles->netpaycc121 == 0)
                        @else
                                <td colspan="3"></td>
                                <td >Take Home Pay</td>
                                <td > Rp.
                                {{number_format($offcycles->netpaycc121, 0, ',', '.')}}
                                </td>
                        @endif
                    </tr>

                </table>
            </div>
            <table class="table table-bordered mt-0 py-0 px-0 mt-3">
                <tbody>
                <tr>
                    <td class="p-0">
                        <div class="card-header border m-0">Upah Pokok Tunjangan Tetap</div>
                        <table class=" card-body table border border-black table-sm mb-0">
                            <tbody>
                                @if($offcycles->tunjangan_transport == 0)
                                @else
                                    <tr><td>Tunjangan Transport</td><td style="text-align:right">{{number_format($offcycles->tunjangan_transport, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_komunikasi == 0)
                                @else
                                    <tr><td>Tunjangan Komunikasi</td><td style="text-align:right">{{number_format($offcycles->tunjangan_komunikasi, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_jabatan == 0)
                                @else
                                    <tr><td>Tunjangan Jabatan</td><td style="text-align:right">{{number_format($offcycles->tunjangan_jabatan, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_kinerja_pegawai == 0)
                                @else
                                    <tr><td>Tunjangan Kinerja Pegawai</td><td style="text-align:right">{{number_format($offcycles->tunjangan_kinerja_pegawai, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_kemahalan == 0)
                                @else
                                    <tr><td>Tunjangan Kemahalan</td><td style="text-align:right">{{number_format($offcycles->tunjangan_kemahalan, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_cuti == 0)
                                @else
                                    <tr><td>Tunjangan Cuti</td><td style="text-align:right">{{number_format($offcycles->tunjangan_cuti, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_profesi == 0)
                                @else
                                    <tr><td>Tunjangan Profesi</td><td style="text-align:right">{{number_format($offcycles->tunjangan_profesi, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangn_tidak_tetap_pkwt == 0)
                                @else
                                    <tr><td>Tunjangn Tidak Tetap Pkwt</td><td style="text-align:right">{{number_format($offcycles->tunjangn_tidak_tetap_pkwt, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->tunjangan_keahlian == 0)
                                @else
                                    <tr><td>Tunjangan Keahlian</td><td style="text-align:right">{{number_format($offcycles->tunjangan_keahlian, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->prestasi == 0)
                                @else
                                    <tr><td>Prestasi</td><td style="text-align:right">{{number_format($offcycles->prestasi, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->shift_allowance == 0)
                                @else
                                    <tr><td>Shift Allowance</td><td style="text-align:right">{{number_format($offcycles->shift_allowance, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->best_performance == 0)
                                @else
                                    <tr><td>Best Performance</td><td style="text-align:right">{{number_format($offcycles->best_performance, 0, ',', '.')}}</td></tr>
                                @endif

                                @if($offcycles->lembur == 0)
                                @else
                                    <tr><td>Lembur</td><td style="text-align:right">{{number_format($offcycles->lembur, 0, ',', '.')}}</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </td>
                    <td rowspan="2">

                    </td>
                    <td class="p-0">
                        <div class="card-header">Potongan</div>
                        <table class="card-body table border border-black table-sm mb-0">
                            <tbody>
                                @if($offcycles->potongan_lain == 0)
                                @else
                                    <tr><td>Potongan Lain</td><td style="text-align:right">{{number_format($offcycles->potongan_lain, 0, ',', '.')}}</td></tr>
                                @endif
                                    <tr><td>Admin Bank</td><td style="text-align:right">{{number_format($offcycles->admin_bank, 0, ',', '.')}}</td></tr>
                                @if($offcycles->penalty == 0)
                                @else
                                    <tr><td>Penalty</td><td style="text-align:right">{{number_format($offcycles->penalty, 0, ',', '.')}}</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="p-0">
                        <table class="card-footer table border border-black mb-0">
                            @if($offcycles->bruto == 0)
                            @else
                                <tr class=" fw-bolder">
                                    <td >Total</td>
                                    <td style="text-align:right"  >
                                    {{number_format($offcycles->bruto, 0, ',', '.')}}
                                    </td>
                                </tr>
                            @endif

                            @if($offcycles->netpaycc121 == 0)
                            @else
                                <tr class=" fw-bolder">
                                <td >Total</td>
                                    <td style="text-align:right"  >
                                    {{number_format($totaloffcyclecc121, 0, ',', '.')}}
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </td>
                    <td  class="p-0">
                        <table class="card-footer table border border-black mb-0">
                            <tr class=" fw-bolder">
                                <td >Total</td>
                                <td style="text-align:right"  >
                                {{number_format($totalpotonganoffcycle, 0, ',', '.')}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="page-footer" style="width: 100%; text-align: center; font-style: italic; font-size: 85%;">
                Slip Penghasilan ini di generate otomatis secara elektronik pada tanggal {{ $salaryslip->created_at->isoFormat('DD MMMM YYYY HH:mm:ss') }} dengan Aplikasi eoffice KA Pariwisata, scan qrcode untuk memastikan keaslian dokumen
            </div>
    </main>
</body>
</html>
