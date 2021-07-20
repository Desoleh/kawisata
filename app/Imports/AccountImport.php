<?php

namespace App\Imports;

use App\Models\Account;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AccountImport implements ToCollection, WithStartRow, WithUpserts
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Account::updateOrCreate(
                [
                    'nip'=> $row[1],
                ],
                [
                'ktp' =>  $row[40],
                'npwp' =>  $row[42],
                'jamsostek' =>  $row[51],
                'alamat1' =>  $row[43],
                'alamat2' =>  $row[44],
                'District' =>  $row[45],
                'City' =>  $row[46],
                'Postal' =>  $row[47],

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
