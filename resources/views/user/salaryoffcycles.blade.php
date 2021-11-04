<?php
    // $nama = $employee->nama;
    // $nip = $employee->nip;
    // $img = $document->photo;
 ?>
@extends('user.salary')


@section('offcycle')
    <div class="row">
        <div class="col-md table-responsive-md ">
            <div class="card-header bg-primary text-white">
                Tunjangan Tidak Tetap : {{$oncycles->bulan}}
            </div>
            <table class=" card-body table border border-black table-sm mb-0">
                <tbody>
                    <tr ><td>Nama</td><td>{{$oncycles->nama}}</td></tr>
                    <tr><td>NIPP / NIP</td><td>{{$oncycles->nip}}</td></tr>
                    <tr><td>Jabatan</td><td>{{$oncycles->nama_jabatan}}</td></tr>
                    <tr><td>Bank</td><td>{{$oncycles->bank_gaji}}</td></tr>
                    <tr><td>No. NPWP</td><td>{{$employee->npwp}}</td></tr>
                    <tr><td>No. Rekening</td><td>{{$oncycles->no_rekening}}</td></tr>
                    <tr class=" fw-bolder fs-6">
                    </tr>
                </tbody>
            </table>

            <table class="card-footer border table table-borderless">
                    @if(!isset($offcycles->netpay))
                    @else
                        <tr class=" fw-bolder fs-6">
                                <td >Take Home Pay</td>
                                <td  style="text-align-last: right"> Rp.
                                {{number_format($offcycles->netpay, 0, ',', '.')}}
                                </td>
                        </tr>
                    @endif

                    @if(!isset($offcycles->netpaycc121))
                    @else
                        <tr class=" fw-bolder fs-6">
                        <td >Take Home Pay</td>
                                <td style="text-align-last: right" > Rp.
                                {{number_format($offcycles->netpaycc121, 0, ',', '.')}}
                                </td>
                        </tr>
                    @endif
            </table>
        </div>
        <div class="col-md table-responsive-md ">
            <div class="card-header bg-primary text-white">
                Tunjangan Tidak Tetap
            </div>
            <table class="card-body mb-0 table border border-black table-sm">
                <tbody>
                    @if(!isset($offcycles->tunjangan_transport))
                    @else
                        <tr><td>Tunjangan Transport</td><td style="text-align:right">{{number_format($offcycles->tunjangan_transport, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_komunikasi))
                    @else
                        <tr><td>Tunjangan Komunikasi</td><td style="text-align:right">{{number_format($offcycles->tunjangan_komunikasi, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_jabatan))
                    @else
                        <tr><td>Tunjangan Jabatan</td><td style="text-align:right">{{number_format($offcycles->tunjangan_jabatan, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_kinerja_pegawai))
                    @else
                        <tr><td>Tunjangan Kinerja Pegawai</td><td style="text-align:right">{{number_format($offcycles->tunjangan_kinerja_pegawai, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_kemahalan))
                    @else
                        <tr><td>Tunjangan Kemahalan</td><td style="text-align:right">{{number_format($offcycles->tunjangan_kemahalan, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_cuti))
                    @else
                        <tr><td>Tunjangan Cuti</td><td style="text-align:right">{{number_format($offcycles->tunjangan_cuti, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_profesi))
                    @else
                        <tr><td>Tunjangan Profesi</td><td style="text-align:right">{{number_format($offcycles->tunjangan_profesi, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangn_tidak_tetap_pkwt))
                    @else
                        <tr><td>Tunjangn Tidak Tetap Pkwt</td><td style="text-align:right">{{number_format($offcycles->tunjangn_tidak_tetap_pkwt, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->tunjangan_keahlian))
                    @else
                        <tr><td>Tunjangan Keahlian</td><td style="text-align:right">{{number_format($offcycles->tunjangan_keahlian, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->prestasi))
                    @else
                        <tr><td>Prestasi</td><td style="text-align:right">{{number_format($offcycles->prestasi, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->shift_allowance))
                    @else
                        <tr><td>Shift Allowance</td><td style="text-align:right">{{number_format($offcycles->shift_allowance, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->best_performance))
                    @else
                        <tr><td>Best Performance</td><td style="text-align:right">{{number_format($offcycles->best_performance, 0, ',', '.')}}</td></tr>
                    @endif

                    @if(!isset($offcycles->lembur))
                    @else
                        <tr><td>Lembur</td><td style="text-align:right">{{number_format($offcycles->lembur, 0, ',', '.')}}</td></tr>
                    @endif
                </tbody>
            </table>
            <table class="card-footer border table table-borderless">
                @if(!isset($offcycles->bruto))
                @else
                    <tr class=" fw-bolder">
                        <td >Total</td>
                        <td style="text-align:right"  >
                        {{number_format($offcycles->bruto, 0, ',', '.')}}
                        </td>
                    </tr>
                @endif

                @if(!isset($offcycles->netpaycc121))
                @else
                    <tr class=" fw-bolder">
                    <td >Total</td>
                        <td style="text-align:right"  >
                        {{number_format($totaloffcyclecc121, 0, ',', '.')}}
                        </td>
                    </tr>
                @endif
            </table>
        </div>
        <div class="col-md table-responsive-md">
            <div class="card-header bg-primary text-white">
                Potongan
            </div>
            <table class="card-body mb-0 table border border-black table-sm">
                <tbody>
                    @if(!isset($offcycles->potongan_lain))
                    @else
                        <tr><td>Potongan Lain</td><td style="text-align:right">{{number_format($offcycles->potongan_lain, 0, ',', '.')}}</td></tr>
                    @endif
                    @if(!isset($offcycles->admin_bank))
                    @else
                        <tr><td>Admin Bank</td><td style="text-align:right">{{number_format($offcycles->admin_bank, 0, ',', '.')}}</td></tr>
                    @endif
                    @if(!isset($offcycles->penalty))
                    @else
                        <tr><td>Penalty</td><td style="text-align:right">{{number_format($offcycles->penalty, 0, ',', '.')}}</td></tr>
                    @endif
                </tbody>
            </table>
            <table class="card-footer border table table-borderless">
                <tr class=" fw-bolder">
                    @if($totalpotonganoffcycle))
                    @else
                    <td >Total</td>
                    <td style="text-align:right"  >
                    {{number_format($totalpotonganoffcycle, 0, ',', '.')}}
                    </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>

@endsection
