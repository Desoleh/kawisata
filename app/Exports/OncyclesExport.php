<?php

namespace App\Exports;

use App\Models\Oncycle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OncyclesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Oncycle::all();
    }

    public function headings():array
    {
    return[
        'NAMA',
        'NIP',
        'POSISI',
        'BANK GAJI',
        'NO.REKENING GAJI',
        'GAJI POKOK',
        'HONORARIUM PKWT',
        'JAMSOSTEK BASE',
        'TUNJANGAN PERUMAHAN',
        'TUNJ ADMIN BANK',
        'TUNJ KEKURANGAN BAYAR',
        'IUR PEG THT 3,25%',
        'IUR PRSH JHT 12,5%',
        'IURAN PEG JHT AJS 4,75%',
        'IUR PERUSAHAAN JHT 3,7%',
        'IURAN PEGAWAI JHT 2%',
        'IUR PRSH JP 2%',
        'IUR PEG JP BPJS',
        'IUR PRSH JKK 1,27%',
        'IUR PRSH JK 0,3%',
        'IURAN PERUSAHAAN JPK KAWI',
        'IURAN PEGAWAI JPK BPJS',
        'IUR PERUSAHAAN JPK 4%',
        'IURAN PEGAWAI JPK 2%',
        'IURAN PEGAWAI JPK UK',
        'IUR PERUSAHAAN JPK PENS',
        'IUR PEG JPK PENS',
        'IUR SPKA',
        'POTONGAN LAIN - LAIN',
        'POT. SEWA RUMAH DINAS',
        'SIMPANAN BAITUL RIDHO',
        'CICILAN BAITUL RIDHO',
        'POT. KELEBIHAN BAYAR',
        'TOTAL PAJAK',
        'NET PAY/BANK TRANSFER',
        'ADMIN BANK',
        'NETPAY',
        'BULAN',
        'IDONCYCLE',
    ];
    }
}
