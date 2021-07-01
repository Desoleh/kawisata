<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::all();
    }

        public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Gelar',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Umur Thn',
            'Umur Bln',
            'TMT Kerja',
            'MK Tahun',
            'MK Bulan',
            'TMT Organik',
            'Gol/Ruang',
            'TMT Pangkat',
            'MK Pkt TH',
            'MK Pkt BL',
            'Jenis Pangkat',
            'MKG Thn',
            'MKG Bln',

        ];
    }
}
