<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{

    public function run(){

        DB::table('currencies')->insert([

           [
              'name_ar' => 'الدينار الكويتي',
              'name_en' => 'KWD',
               'created_at' => now(),
               'updated_at' => now()

           ],
            [

               'name_ar' => 'اليورو',
              'name_en' => 'EUR',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
