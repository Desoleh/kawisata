<?php

namespace App\Imports;

use App\Models\Document;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


use Carbon\Carbon;



class EmployeesImport implements ToCollection, WithUpserts, WithStartRow, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {

        // $value = $worksheet->getCell('A1')->getValue();
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);

        foreach ($rows as $row) {

            Employee::updateOrCreate(
                [
                    'nip' => $row[1],
                ],
                [

                    'nama'          => $row[3],
                    'gelar'         => $row[4],
                    'tempat_lahir'  => $row[6],
                    'tanggal_lahir'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6])->format('Y-m-d'),
                    'umur_thn'      => $row[7],
                    'umur_bln'      => $row[8],
                    'tmt_kerja'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9])->format('Y-m-d'),
                    'mk_tahun'      => $row[10],
                    'mk_bulan'      => $row[11],
                    'tmt_organik'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12])->format('Y-m-d'),
                    'gol_ruang'     => $row[13],
                    'tmt_pangkat'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
                    'mk_pkt_th'     => $row[15],
                    'mk_pkt_bl'     => $row[16],
                    'jenis_pangkat' => $row[17],
                    'mkg_thn'       => $row[18],
                    'mkg_bln'       => $row[19],


                ]
            );
            Document::updateOrCreate(
                [
                    'nip' => $row[1],
                ]
            );

        }
        // dd($rows);
    }

    public function uniqueBy()
    {
        return 'nip';
    }

    public function startRow(): int
    {
        return 2;
    }
}
