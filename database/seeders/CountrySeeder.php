<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{

    public function run(){

        DB::table('countries')->insert([

            [
              'name_ar' => 'الرياض',
              'name_en' => 'Elriad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'السعوديه',
                'name_en' => 'Esodia',
                'created_at' => now(),
                'updated_at' => now()

            ]

        ]);
    }
}
