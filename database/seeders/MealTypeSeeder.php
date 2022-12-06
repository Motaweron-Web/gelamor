<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('meal_types')->insert([
            [
                'name_ar' => 'الفطار',
                'name_en' => 'breakfast',
                'details_en' => 'breakfast',
                'details_ar' => 'الفطار',
                'package_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'الغداء',
                'name_en' => 'lunch',
                'details_en' => 'lunch',
                'details_ar' => 'الغداء',
                'package_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['name_ar' => 'العشاء',
                'name_en' => 'dinner',
                'details_en' => 'dinner',
                'details_ar' => 'العشاء',
                'package_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'سناكس',
                'name_en' => 'snacks',
                'details_en' => 'snacks',
                'details_ar' => 'سناكس',
                'package_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
