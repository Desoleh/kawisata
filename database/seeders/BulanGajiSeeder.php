<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulanGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        $bulan = [
            ['bulangaji' => "Januari 2021"],
            ['bulangaji' => "Februari 2021"],
            ['bulangaji' => "Maret 2021"],
            ['bulangaji' => "April 2021"],
            ['bulangaji' => "Mei 2021"],
            ['bulangaji' => "Juni 2021"],
            ['bulangaji' => "Juli 2021"],
            ['bulangaji' => "Agustus 2021"],
            ['bulangaji' => "September 2021"],
            ['bulangaji' => "Oktober 2021"],
            ['bulangaji' => "November 2021"],
            ['bulangaji' => "Desember 2021"],
            
        ];

        DB::table('bulan_gajis')->insert($bulan);

    
    }
}
