<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>



        img {
        width: 100%;
        height: auto;

        }

        .container {
            margin-top: 80px;
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
        position: fixed;  ;
        top: 0px;
        left: 67%;
        width: auto;
        }

        .container .fixbottom {
        position: absolute;  ;
        top: 930px;
        width: 100%;
        left: 0 !important;
        bottom: 10px;
        height: auto;
        }

    </style>
</head>
<body>
    <?php
    $nama = $employee->nama;
    $nip = $employee->nip;
        $img = $document->photo;
 ?>

<div class="container">
    <div style="text-align: center;">
        <img class="topright" src="{{public_path('images/logo.png')}}" style="height: 95px">
        <img class="fixbottom" src="{{public_path('images/kopsurat.png')}}" style="width: 793px">
        <h3> <strong>  Slip Penghasilan</strong></h3>
    </div>



</div>

</body>
</html>
