<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealTypePackageResource;
use App\Http\Resources\MealTypeResource;
use App\Http\Resources\PackageResource;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\MealTypePackage;
use App\Models\Package;

class PackageController extends Controller{


    public function all(){

        try {


            $packages = Package::query()->latest()->get();

            if($packages->count() > 0)

            return returnDataSuccess("تم الحصول علي جميع الباقات بنجاح",200,"packages",PackageResource::collection($packages));

            else
                return returnMessageError("لا يوجد باقات الي الان",404);

        }catch (\Exception $e){


            return returnMessageError($e->getMessage(),500);
        }
    }

    public function onePackage($id){

        try {

            $package = Package::find($id);

            if(!$package){

                return returnMessageError("هذه الباقه غير موجوده بسجل البيانات",404);
            }

            $meal_types = MealTypePackage::query()->where('package_id','=',$package->id)->get();

            if($meal_types->count() > 0)

                return returnDataSuccess("تم الحصول علي جميع انواع الوجبات التابعه لهذه الوجبه بنجاح",200,"meal_types",MealTypePackageResource::collection($meal_types));

            else
                return returnMessageError("لا يوجد انواع وجبات مسجله مسبقا تابعه لهذه الباقه",404);

        }catch (\Exception $e){


            return returnMessageError($e->getMessage(),500);
        }

    }



    public function mealTypeWithMeals($id){

        try {

            $meal_type = MealType::find($id);

            if(!$meal_type){

                return returnMessageError("هذا النوع من الوجبات غير موجود",404);
            }

            $meals = Meal::query()->where('meal_type_id','=',$meal_type->id)->get();

            if($meals->count() > 0)

                return returnDataSuccess("تم الحصول علي جميع الوجبات التابعه لهذه النوع بنجاح",200,"meals",MealResource::collection($meals));

            else
                return returnMessageError("لا يوجد  وجبات مسجله مسبقا تابعه لهذه النوع",404);

        }catch (\Exception $e){


            return returnMessageError($e->getMessage(),500);
        }

    }


}
