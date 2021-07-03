<?php

namespace App\Imports;

use App\Models\Position;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PositionsImport implements ToCollection, WithUpserts, WithStartRow
{
    public function collection(Collection $rows)
    {

        // $value = $worksheet->getCell('A1')->getValue();
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);
// dd($rows);
        foreach ($rows as $row) {

            Position::updateOrCreate(
                [
                    'position_id'=> $row[0],
                ],
                [

                    'name'=> $row[1],
                    'grade'=> $row[2],
                    'holder_id'=> $row[3],
                    'parent_id'=> $row[4],
                    'parent_name'=> $row[5],
                    'hierarchy'=> $row[6]
                ]
            );

        }

    }

    public function uniqueBy()
    {
        return 'position_id';
    }

    public function startRow(): int
    {
        return 2;
    }

}
