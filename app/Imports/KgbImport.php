<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kgb;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Excel;

class KgbImport implements ToCollection, WithStartRow, WithUpserts
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Kgb::updateOrCreate(
                [
                    'nip'=> $row[0],
                ],
                [
                'startdate' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])->format('Y-m-d'),
                'enddate'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2])->format('Y-m-d'),
                'prevkgb'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('Y-m-d'),
                'tmtkgb'    =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m-d'),
                'nextkgb'   =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d'),


            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function uniqueBy()
    {
        return 'nip';
    }
}
