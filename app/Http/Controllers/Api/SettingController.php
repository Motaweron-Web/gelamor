<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;

class SettingController extends Controller{


    public function setting(){

        try {

            $setting = Setting::query()->first();

            return returnDataSuccess("setting get successfully",200,"setting",new SettingResource($setting));


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),500);
        }

    }

}
