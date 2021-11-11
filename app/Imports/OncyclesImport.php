<?php

namespace App\Imports;

use App\Models\Oncycle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithStartRow;


class OncyclesImport implements ToCollection, WithUpserts, WithStartRow, SkipsEmptyRows, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            Oncycle::updateOrCreate(
                [
                    'idoncycle'=> $row[46].$row[1],
                ],
                [

                    'nama'=> $row[0],
                    'nip'=> $row[1],
                    'nama_jabatan'=> $row[2],
                    'bank_gaji'=> $row[3],
                    'no_rekening'=> $row[4],
                    'upah_pokok'=> $row[5],
                    'honorarium_pkwt'=> $row[6],
                    'bpjs_base'=> $row[7],
                    'tunj_perumahan'=> $row[8],
                    'tunj_adm_bank'=> $row[9],
                    'tunj_kurang_bayar'=> $row[10],
                    'tht_taspen_iur_pekerja_3_25'=> $row[11],
                    'jht_jwasraya_iur_persh_12_5'=> $row[12],
                    'jht_jwasraya_iur_pekerja_4_75'=> $row[13],
                    'jht_bpjs_iur_persh_3_7'=> $row[14],
                    'jht_bpjs_iur_pekerja_2'=> $row[15],
                    'jp_bpjs_iur_persh_2'=> $row[16],
                    'jp_bpjs_iur_pekerja_1'=> $row[17],
                    'jkk_bpjs_iur_persh_1_27'=> $row[18],
                    'jk_bpjs_iur_persh_0_3'=> $row[19],
                    'jpk_bpjs_mand_iur_persh'=> $row[20],
                    'jpk_bpjs_mand_iur_pekerja'=> $row[21],
                    'jpk_bpjs_iur_persh_4'=> $row[22],
                    'jpk_bpjs_iur_pekerja_1'=> $row[23],
                    'jpk_uk_iur_pekerja_1'=> $row[24],
                    'jpk_pensiunan_iur_persh_2'=> $row[25],
                    'jpk_pensiunan_iur_pekerja_2'=> $row[26],
                    'iur_spka'=> $row[27],
                    'pot_lain'=> $row[28],
                    'pot_sewa_rumah_dinas'=> $row[29],
                    'pot_sewa_mess'=> $row[30],
                    'simpanan_baitul_ridho'=> $row[31],
                    'cicilan_baitul_ridho'=> $row[32],
                    'pot_kelebihan_bayar'=> $row[33],
                    'total_pajak'=> $row[34],
                    'bruto'=> $row[35],
                    'admin_oncycle'=> $row[44],
                    'netpay'=> $row[45],
                    'bulan'=> $row[46],
                    // 't_direksi'=> $row[44],
                    // 't_perumahan_direksi'=> $row[45],


                ]
            );

        }

    }

    public function uniqueBy()
    {
        return 'idoncycle';
    }

    public function startRow(): int
    {
        return 2;
    }

}
