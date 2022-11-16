<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(){


        DB::table('users')->insert([

            [

                'name_ar' => 'اسلام محمد',
                'name_en' => 'Islam Mohammed',
                'img' => 'default.png',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'phone' => 758584,
                'location_ar' => 'القاهره',
                'location_en' => 'cairo street',
                'country_id' => rand(1,2),
            ],
            [

                'name_ar' => 'علي محمد',
                'name_en' => 'ali mohammed',
                'img' => 'default.png',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => 9898989999,
                'location_ar' => 'القاهره',
                'location_en' => 'cairo street',
                'country_id' => rand(1,2),
            ]


        ]);
    }
}
