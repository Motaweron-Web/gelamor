<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'name_ar',
        'name_en',
        'protein',
        'calories',
        'fats',
        'carbohydrates',
        ];



    public function meal(){

        return $this->belongsToMany(Meal::class,'meal_components','component_id','meal_id','id','id');
    }

    public function order_special(){

        return $this->hasMany(OrderSpecial::class,'component_id','id');
    }


}
