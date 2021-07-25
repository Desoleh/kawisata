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

            header table th {
                margin-top: 100px
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
                border: 0.5px;
            }


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
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Nama Bank</th>
                        <th>Nomor Rekening</th>
                        <th>Tunjangan Transport</th>
                        <th>Tunjangan Komunikasi</th>
                        <th>Tunjangan Jabatan</th>
                        <th>Tunjangan Kinerja Pegawai</th>
                        <th>Tunjangan Kemahalan</th>
                        <th>Tunjangan Cuti</th>
                        <th>Tunjangan Profesi</th>
                        <th>Tunjangn Tidak Tetap Pkwt</th>
                        <th>Bruto</th>
                        <th>Potongan Lain</th>
                        <th>Bruto</th>
                        <th>Admin Bank</th>
                        <th>Netpay</th>
                    </tr>
                </thead>
            </table>
        </header>

        <footer>
            <img src="{{ asset('images/kopsurat.png') }}"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <div class="container">
            <h5 style="text-align: center; font-weight: bold; "> <strong>Slip Penghasilan</strong></h5>

            <table id="example1" class="table table-bordered table-striped small">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Nama Bank</th>
                        <th>Nomor Rekening</th>
                        <th>Tunjangan Transport</th>
                        <th>Tunjangan Komunikasi</th>
                        <th>Tunjangan Jabatan</th>
                        <th>Tunjangan Kinerja Pegawai</th>
                        <th>Tunjangan Kemahalan</th>
                        <th>Tunjangan Cuti</th>
                        <th>Tunjangan Profesi</th>
                        <th>Tunjangn Tidak Tetap Pkwt</th>
                        <th>Bruto</th>
                        <th>Potongan Lain</th>
                        <th>Bruto</th>
                        <th>Admin Bank</th>
                        <th>Netpay</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($offcycles as $offcycle)
                            <tr>
                                <td>{{$offcycle->nama}}</td>
                                <td>{{$offcycle->nip}}</td>
                                <td>{{$offcycle->nama_bank}}</td>
                                <td>{{$offcycle->nomor_rekening}}</td>
                                <td>{{number_format($offcycle->tunjangan_transport, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangan_komunikasi, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangan_jabatan, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangan_kinerja_pegawai, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangan_kemahalan, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangan_cuti, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangan_profesi, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->tunjangn_tidak_tetap_pkwt, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->bruto, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->potongan_lain, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->bruto1, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->admin_bank, 0, ',', '.')}}</td>
                                <td>{{number_format($offcycle->netpay, 0, ',', '.')}}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">No User Found</td>
                                </tr>
                        @endforelse
                </tbody>
            </table>


        </div>
    </body>
</html>

