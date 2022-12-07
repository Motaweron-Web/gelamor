<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{

    public function run()
    {

        DB::table('settings')->insert([

            [
                'location_ar' => 'الكويت',
                'location_en' => 'Elkuet',
                'name_ar' => 'جيلامور',
                'name_en' => 'Glamor',
                'about_ar' => 'شركه جيلامور لتخسيس وزياده الاوزان للجسم والطعام الصحي',
                'about_en' => 'Glamor company to lose weight and increase body weights and healthy food',
                'privacy_ar' => 'جميع الحقوق محفوظه لشركه جلامور لعام@2022',
                'privacy_en' => 'All rights reserved to Glamor for the year 2022',
                'terms_ar' => 'الشروط والاحكام',
                'terms_en' => 'Terms and Conditions',
                'facebook' => 'https://www.facebook.com/',
                'whatsapp' => 'https://web.whatsapp.com/',
                'snapchat' => 'https://www.snapchat.com/',
                'created_at' => now(),
                'updated_at' => now()

            ]

        ]);

    }
}


