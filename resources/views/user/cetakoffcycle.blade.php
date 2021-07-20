<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/3.3/bootstrap.min.css') }}">
        <style>
            * {
            box-sizing: border-box;
            }
            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 3cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: -2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: -2.5cm;
                left: 16cm;
                right: 0cm;
                height: 92px;
            }

            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: -2cm;
                left: 1cm;
                right: 0cm;
                /* height: 2cm; */
                width: 100%;
            }

            .container {
                margin-left: 2cm;
                margin-right: 2cm;
                margin-top: -5cm;
                margin-bottom: 2cm;
            }

            .container table {
            } 
            
            .container table th {
                padding: 7px;
                background-color: #d1d1d1;
            }
            table.table0 tr, table.table0 td {
                width: 100%;
                padding: 2px;
                border-bottom: 0.1px solid rgb(134, 134, 134);
                border-collapse: collapse;
            }

            table.table0 table.table0 th {
                padding: 2px;
                background-color: #d1d1d1;
            }

            table.table4{
                width: 100%;
            }
            table.table4 tr, table.table4 td {
                width: 100%;
                padding: 2px;
                border-bottom: 0.1px solid rgb(134, 134, 134);
                border-collapse: collapse;
            }
            table.table4 td#1 {
                width: 100%;
                padding: 2px;
                border-bottom: 0.1px solid rgb(134, 134, 134);
                border-collapse: collapse;
                background-color: #e9e8e8;
            }


            table.table4 th#head1 {
                padding: 2px;
                background-color: #d1d1d1;
                border-bottom: 0.1px solid rgb(134, 134, 134);
            }

            table.table1 {
                width: 100%;
            }

            table.table1 tr, table.table1 td {
                padding: 2px;
                border-bottom: 0.1px solid rgb(134, 134, 134);
                border-collapse: collapse;
            }
            table.table1 td#data1 {
                width: 100px;
                padding: 2px;
                border-bottom: 0.1px solid rgb(134, 134, 134);
                border-collapse: collapse;
                background-color: #e9e8e8;
            }

            table.table1 td#data2 {
                width: 25px;
                padding: 2px;
                border-bottom: 0.1px solid rgb(134, 134, 134);
                border-collapse: collapse;
            }

            table.table1 th#head1 {
                padding: 7px;
                background-color: #d1d1d1;
                border-bottom: 0.1px solid rgb(134, 134, 134);
            }

            table.table2 tr, table.table2 td {
                padding: 2px;
                border-bottom: 0px solid rgb(134, 134, 134);
                border-collapse: collapse;
                
            }


            /* tr:nth-child(even) {background-color: #f2f2f2;} */

            .h5 {
                font-weight: bold;
            }



        </style>
    </head>
    <body>

        <?php 
        $nip = $salaryslip->nip;
        $monthyear = $salaryslip->monthyear;
        // dd($uuid);
         ?>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="{{ asset('images/logo1.png') }}" width="auto" height="92px"/>
        </header>

        <footer>
            <img src="{{ asset('images/kopsurat.png') }}"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <div class="container">
            <h5 style="text-align: center; font-weight: bold; "> <strong>Slip Penghasilan</strong></h5>

            <table class="table0" >
                <thead>
                    <tr>
                            <th colspan="3" class="table-active" style="width:70%; text-align:center;">
                                @forelse ($oncycles as $oncycle)
                                Tunjangan Tidak Tetap : {{$oncycle->bulan}}
                                @empty
                                Tunjangan Tidak Tetap :
                                @endforelse
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td valign="top">
                            <table class="table4">
                                <tbody>
                                    @forelse ($oncycles as $oncycle )
                                        <tr><td id="1" style="width:35%;">Nama</td><td>{{$oncycle->nama}}</td> 
                                        </tr>
                                        <tr><td id="1" style="width:35%;">NIPP / NIP</td><td>{{$oncycle->nip}}</td></tr>
                                        <tr><td id="1" style="width:35%;">Jabatan</td><td>{{$oncycle->nama_jabatan}}</td></tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="width: 3%;">

                        </td>
                        <td>
                            <table class="table4">
                                <tbody>
                                        <tr><td id="1">Bank</td><td>{{$oncycle->bank_gaji}}</td></tr>
                                        <tr><td id="1">No. Rekening</td><td>{{$oncycle->no_rekening}}</td></tr>
                                        <tr><td id="1">No. NPWP</td><td>{{$employee->npwp}}</td></tr>
                                        <tr class=" fw-bolder fs-6">
                                            <th id="head1" colspan="2" class="text-center table-active ">Take Home Pay</th>
                                        </tr>
                                        @empty
                                        <p>Data Kosong</p>
                                    @endforelse
                                        <tr>
                                        @forelse ($offcycles as $offcycle )
                                        @if($offcycle->netpay == 0)
                                        @else
                                            <th colspan="2" class="total table-primary text-center" > Rp.
                                            {{number_format($offcycle->netpay, 0, ',', '.')}}
                                            </th>
                                        @endif
                                        </tr>
                                        <tr>
                                            @if($offcycle->netpaycc121 == 0)
                                            @else
                                                <th colspan="2" class="total table-primary text-center" > Rp.
                                                {{number_format($offcycle->netpaycc121, 0, ',', '.')}}
                                                </th>
                                            @endif

                                            @empty
                                            <p>Data Kosong</p>
                                            @endforelse
                                        </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table class="table1" >
                <tr>
                    <td valign="top">
                        <table  style="width: 100%;">
                            <tbody>
                                @forelse ($offcycles as $offcycle )
                                    <tr>
                                        <th colspan="2" class="table-active" style="width:70%">Tunjangan</th>
                                    </tr>

                                    @if($offcycle->tunjangan_transport == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Transport</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_transport, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_komunikasi == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Komunikasi</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_komunikasi, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_jabatan == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Jabatan</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_jabatan, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_kinerja_pegawai == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Kinerja Pegawai</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_kinerja_pegawai, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_kemahalan == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Kemahalan</td><td style="text-align:right">{{number_format($offcycle->tunjangan_kemahalan, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_cuti == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Cuti</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_cuti, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_profesi == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Profesi</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_profesi, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangn_tidak_tetap_pkwt == 0)
                                    @else
                                        <tr><td id="data1">Tunjangn Tidak Tetap Pkwt</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangn_tidak_tetap_pkwt, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->tunjangan_keahlian == 0)
                                    @else
                                        <tr><td id="data1">Tunjangan Keahlian</td><td id="data2" style="text-align:right">{{number_format($offcycle->tunjangan_keahlian, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->prestasi == 0)
                                    @else
                                        <tr><td id="data1" id="data1"</td><td id="data2" style="text-align:right">{{number_format($offcycle->prestasi, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->shift_allowance == 0)
                                    @else
                                        <tr><td id="data1">Shift Allowance</td><td id="data2" style="text-align:right">{{number_format($offcycle->shift_allowance, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->best_performance == 0)
                                    @else
                                        <tr><td id="data1">Best Performance</td><td style="text-align:right">{{number_format($offcycle->best_performance, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @if($offcycle->lembur == 0)
                                    @else
                                        <tr><td id="data1">Lembur</td><td id="data2" style="text-align:right">{{number_format($offcycle->lembur, 0, ',', '.')}}</td></tr>
                                    @endif

                                    @empty
                                    <p>Data Kosong</p>
                                @endforelse


                            </tbody>
                        </table>
                    </td>
                        <td style="width: 3%;">

                        </td>
                    <td valign="top">
                        <table style="width: 100%;">
                            <tbody>
                                @forelse ($offcycles as $offcycle )
                                    <tr>
                                        <th colspan="2" class="table-active" style="width:70%">Potongan</th>
                                    </tr>

                                    @if($offcycle->potongan_lain == 0)
                                    @else
                                        <tr><td id="data1">Potongan Lain</td><td id="data2" style="text-align:right">{{number_format($offcycle->potongan_lain, 0, ',', '.')}}</td></tr>
                                    @endif
                                        <tr><td id="data1">Admin Bank</td><td id="data2" style="text-align:right">{{number_format($offcycle->admin_bank, 0, ',', '.')}}</td></tr>
                                    @if($offcycle->penalty == 0)
                                    @else
                                        <tr><td id="data1">Penalty</td><td id="data2" style="text-align:right">{{number_format($offcycle->penalty, 0, ',', '.')}}</td></tr>
                                    @endif

                                @empty
                                    data kosong
                                @endforelse
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            @forelse ($offcycles as $offcycle )
                                @if($offcycle->bruto == 0)
                                @else
                                    <tr class=" fw-bolder">
                                        <th class="table-activ" width="210px">Total</th>
                                        <th style="text-align:right" class="table-activ" width="30%" >
                                        {{number_format($offcycle->bruto, 0, ',', '.')}}
                                        </th>
                                    </tr>
                                @endif

                                @if($offcycle->netpaycc121 == 0)
                                @else
                                    <tr class=" fw-bolder">
                                    <td class="table-activ" width="210px">Total</td>
                                        <td style="text-align:right" class="table-activ" width="30%" >
                                        {{number_format($totaloffcyclecc121, 0, ',', '.')}}
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                data kosong
                            @endforelse
                        </table>
                    </td>
                        <td style="width: 3%;">

                        </td>
                    <td>
                        <table>
                            @forelse ($offcycles as $offcycle )
                                    <tr class=" fw-bolder">
                                            <th class="table-activ" width="210px">Total</th>
                                            <th style="text-align:right" class="table-activ" width="30%" >
                                            {{number_format($totalpotonganoffcycle, 0, ',', '.')}}
                                            </th>
                                        </tr>

                            @empty
                                data kosong
                            @endforelse
                        </table>
                    </td>
                </tr>
            </table>
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
                        <td style="width: 5px;">
                                
                        </td>
                    </tr>
                </table>
            </div>


        </div>
    </body>
</html>

