<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    public function run(){

        DB::table('roles')->insert([

            [

                'name' => 'admin',
                'permissions' => json_encode(["users","admins","orders","setting","contact_us"]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [

                'name' => 'employee',
                'permissions' => json_encode(["users","admins","orders"]),
                'created_at' => now(),
                'updated_at' => now()
            ]


        ]);
    }
}
