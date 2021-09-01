<?php

namespace App\Imports;

use App\Models\Regulation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Ramsey\Uuid\Uuid;

class RegulationImport implements ToCollection, WithUpserts, WithStartRow, SkipsEmptyRows
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            $uuid = (string)Uuid::uuid4();
            Regulation::updateOrCreate(
                [
                    'kode' => $row[0],
                ],
                [

            'uuid' => $uuid,
            'judul' => $row[1],
            'judul_singkat' => $row[2],
            'category_id' => $row[3],
            'nomor' => $row[4],
            'tahun' => $row[5],
            'grade' => $row[6],
            'tgl_penetapan' => $row[7],
            'tgl_efektif' => $row[8],
            'konseptor' => $row[9],
            'diubah' => $row[10],
            'status' => $row[11],
            'keterangan' => $row[12],

                ]
            );

        }

    }

    public function uniqueBy()
    {
        return 'kode';
    }

    public function startRow(): int
    {
        return 2;
    }

}

