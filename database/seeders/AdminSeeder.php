<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run(){


        DB::table('admins')->insert([

            [

              'name'  => 'admin',
              'email' => 'admin@admin.com',
              'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],

               [

              'name'  => 'admin2',
              'email' => 'admin123@gmail.com',
              'password' => Hash::make('123456'),
                   'created_at' => now(),
                   'updated_at' => now()
            ],

               [

              'name'  => 'admin',
              'email' => 'admin12345@gmail.com',
              'password' => Hash::make('123456'),
                   'created_at' => now(),
                   'updated_at' => now()
            ],


        ]);
    }
}
