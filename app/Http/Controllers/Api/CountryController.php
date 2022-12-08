<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use GeneralTrait;
    public function index(Request $request)
    {
        $countries = Country::select("id","name_".accept_language() ." as name")->get();
        return $this->returnData('countries',$countries);
    }
}
