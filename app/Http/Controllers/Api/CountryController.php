<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        try {

           $countries = Country::latest()->get();

            return helperJson(CountryResource::collection($countries), "تم الحصول علي بيانات الدول بنجاح");


        }catch (\Exception $exception){


            return helperJson(null, "يوجد خطاء ببيانات الدخول حاول مره اخري",500);


        }
    }
}
