<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{

    public function run(){

        DB::table('categories')->insert([

            [
              'name_ar' => 'الحفاظ علي الجسم',
              'name_en' => 'maintain the body',
                'created_at' => now(),
                'updated_at' => now()

            ],
             [
              'name_ar' => 'تخسيس الجسم',
              'name_en' => 'body slimming',
                 'created_at' => now(),
                 'updated_at' => now()

            ],
             [
              'name_ar' => 'زياده الوزن',
              'name_en' => 'overweight',
                 'created_at' => now(),
                 'updated_at' => now()

            ],



        ]);
    }
}
