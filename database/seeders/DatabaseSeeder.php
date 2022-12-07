<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(){


         //start call all seeder here

        $this->call(CategorySeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ChefSeeder::class);
        $this->call(ContactUsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(MealTypeSeeder::class);


    }
}
