<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
    $img = $document->photo;
 ?>
@extends('user.salary')

@section('offcycle')
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 table-responsive-md ">
                                                <table class="table border border-black table-sm">
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

@endsection