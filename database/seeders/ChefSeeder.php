<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChefSeeder extends Seeder
{

    public function run(){

        DB::table('chefs')->insert([

            [

                'name'  => 'chef1',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],

            [

                'name'  => 'chef1',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],

            [

                'name'  => 'chef3',
                'email' => 'admin12345@gmail.com.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],


        ]);
    }
}
