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
                margin: 4cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: -3.5cm;
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
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            .container table {
            } 
            
            th {
                padding: 7px;
                background-color: #a5a5a5;
            }
            tr, td {
                padding: 5px;
            }

            tr:nth-child(even) {background-color: #f2f2f2;}

        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="{{ asset('images/logo1.png') }}" width="auto" height="92px"/>
        </header>

        <footer>
            <img src="{{ asset('images/kopsurat.png') }}"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <div class="container">
            <h5 style="text-align: center; "> <strong>  Slip Penghasilan</strong></h5>
            <br>
            <table class="table table-bordered success" >
                <thead>
                    <tr>
                            <th colspan="3" class="table-active" style="width:70%">
                                @forelse ($oncycles as $oncycle)
                                Upah Pokok Tunjangan Tetap : {{$oncycle->bulan}}
                                @empty
                                Upah Pokok Tunjangan Tetap :
                                @endforelse
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse ($oncycles as $oncycle )
                            <tr ><td>Nama</td><td>{{$oncycle->nama}}</td> <td rowspan="7"></td>1</tr>
                            <tr><td>NIPP / NIP</td><td>{{$oncycle->nip}}</td></tr>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

