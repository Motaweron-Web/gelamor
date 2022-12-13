<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $category = Category::get();

            return helperJson(CategoryResource::collection($category),'تم الحصول علي البيانات بنجاح');

        } catch (\Exception $e) {
            return returnMessageError($e->getMessage(), 500);
        }
    }
}
