<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Offcycle;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class OffcyclesImport implements ToCollection, WithUpserts, WithStartRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {

        // $value = $worksheet->getCell('A1')->getValue();
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);
// dd($rows);
        foreach ($rows as $row) {

            Offcycle::updateOrCreate(
                [
                    'idoffcycle'=> $row[24].$row[1],
                ],
                [

                    'nama'=> $row[0],
                    'nip'=> $row[1],
                    'nama_bank'=> $row[2],
                    'nomor_rekening'=> $row[3],
                    'tunjangan_transport'=> $row[4],
                    'tunjangan_komunikasi'=> $row[5],
                    'tunjangan_jabatan'=> $row[6],
                    'tunjangan_kinerja_pegawai'=> $row[7],
                    'tunjangan_kemahalan'=> $row[8],
                    'tunjangan_cuti'=> $row[9],
                    'tunjangan_profesi'=> $row[10],
                    'tunjangn_tidak_tetap_pkwt'=> $row[11],
                    'bruto'=> $row[12],
                    'potongan_lain'=> $row[13],
                    'bruto1'=> $row[14],
                    'admin_bank'=> $row[15],
                    'netpay'=> $row[16],
                    'tunjangan_keahlian'=> $row[17],
                    'prestasi'=> $row[18],
                    'shift_allowance'=> $row[19],
                    'best_performance'=> $row[20],
                    'lembur'=> $row[21],
                    'penalty'=> $row[22],
                    'netpaycc121'=> $row[23],
                    'bulan'=> $row[24],
                    
                ]
            );

        }
        // dd($rows);
    }

    public function uniqueBy()
    {
        return 'idoffcycle';
    }

    public function startRow(): int
    {
        return 2;
    }
}
