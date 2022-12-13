<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComponentCategoryResource;
use App\Http\Resources\ComponentResource;
use App\Models\Component;
use App\Models\ComponentCategory;
use Illuminate\Http\Request;

class ComponentCategoryController extends Controller
{
    public function category()
    {
        try {
            $categories = ComponentCategory::get();
            return helperJson(ComponentCategoryResource::collection($categories),'تم الحصول علي بيانات انواع المكونات بنجاح');

        } catch (\Exception $e) {
            return returnMessageError($e->getMessage(), 500);
        }
    } // end category

    public function componentCategory(Request $request)
    {
        try {

            if(($request->search && $request->search !== '')){
            $components = Component::where('component_categories_id', '=', $request->category_id)

                ->where('name_ar', 'like', '%' . $request->search . '%')
                ->orWhere('name_en', 'like', '%' . $request->search . '%')
                ->get();
            } else {
                $components = Component::where('component_categories_id', '=', $request->category_id)
                    ->get();
            }

            if ($request->search == '' && $request->category_id == ''){
                $components = Component::get();
            }

            return helperJson(ComponentResource::collection($components),'تم الحصول علي البيانات بنجاح');

            } catch (\Exception $e) {
            return returnMessageError($e->getMessage(), 500);
        }
    } // end componentCategory
}
