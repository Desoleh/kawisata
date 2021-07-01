<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('employees')->insert([
            'nip' => '43310'


        ]);

                    DB::table('employees')->insert([

            'nip' => '1234'


        ]);

                    DB::table('employees')->insert([

            'nip' => '19930178'

        ]);

        


    }
}
