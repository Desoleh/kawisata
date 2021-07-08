<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dash = [
            ['kedudukan' => "Kantor Pusat", 'jumlah' => "103", 'urutan' => "1", 'jenis' => "1"],
            ['kedudukan' => "Perbantuan", 'jumlah' => "30", 'urutan' => "2", 'jenis' => "1"],
            ['kedudukan' => "Mandiri", 'jumlah' => "12", 'urutan' => "3", 'jenis' => "1"],
            ['kedudukan' => "PKWT", 'jumlah' => "61", 'urutan' => "4", 'jenis' => "1"],
            ['kedudukan' => "Frontliner", 'jumlah' => "2435", 'urutan' => "5", 'jenis' => "1"],
            ['kedudukan' => "CC 121", 'jumlah' => "154", 'urutan' => "6", 'jenis' => "2"],
            ['kedudukan' => "Daop 1 Jakarta", 'jumlah' => "116", 'urutan' => "7", 'jenis' => "2"],
            ['kedudukan' => "Daop 2 Bandung", 'jumlah' => "102", 'urutan' => "8", 'jenis' => "2"],
            ['kedudukan' => "Daop 3 Cirebon", 'jumlah' => "41", 'urutan' => "9", 'jenis' => "2"],
            ['kedudukan' => "Daop 4 Semarang", 'jumlah' => "85", 'urutan' => "10", 'jenis' => "2"],
            ['kedudukan' => "Daop 4 Semarang (Keu)", 'jumlah' => "10", 'urutan' => "11", 'jenis' => "2"],
            ['kedudukan' => "Daop 5 Purwokerto", 'jumlah' => "56", 'urutan' => "12", 'jenis' => "2"],
            ['kedudukan' => "Daop 6 Yogyakarta", 'jumlah' => "91", 'urutan' => "13", 'jenis' => "2"],
            ['kedudukan' => "Daop 7 Madiun", 'jumlah' => "79", 'urutan' => "14", 'jenis' => "2"],
            ['kedudukan' => "Daop 8 Surabaya", 'jumlah' => "142", 'urutan' => "15", 'jenis' => "2"],
            ['kedudukan' => "Daop 9 Jember", 'jumlah' => "42", 'urutan' => "16", 'jenis' => "2"],
            ['kedudukan' => "Divre I Sumatra utara", 'jumlah' => "47", 'urutan' => "17", 'jenis' => "2"],
            ['kedudukan' => "Divre II Sumatra Barat", 'jumlah' => "48", 'urutan' => "18", 'jenis' => "2"],
            ['kedudukan' => "Divre III Palembang", 'jumlah' => "23", 'urutan' => "19", 'jenis' => "2"],
            ['kedudukan' => "Divre IV Tanjungkarang", 'jumlah' => "30", 'urutan' => "20", 'jenis' => "2"],
            ['kedudukan' => "KCI-Jabodetabek-Lebak", 'jumlah' => "986", 'urutan' => "21", 'jenis' => "2"],
            ['kedudukan' => "KCI-Merak", 'jumlah' => "99", 'urutan' => "22", 'jenis' => "2"],
            ['kedudukan' => "KCI-Yogyakarta", 'jumlah' => "133", 'urutan' => "23", 'jenis' => "2"],
            ['kedudukan' => "LRT Palembang", 'jumlah' => "117", 'urutan' => "24", 'jenis' => "2"],
            ['kedudukan' => "Railink", 'jumlah' => "18", 'urutan' => "25", 'jenis' => "2"],
            ['kedudukan' => "Railink Medan", 'jumlah' => "12", 'urutan' => "26", 'jenis' => "2"],
            ['kedudukan' => "Subdivre 1.1 Aceh", 'jumlah' => "4", 'urutan' => "27", 'jenis' => "2"],
        ];

        DB::table('dashboard_employees')->insert($dash);

    }
}
