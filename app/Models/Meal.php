<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'img',
        'protein',
        'calories',
        'Fats',
        'carbohydrates',
        'meal_type_id'


    ];


    public function meal_type(){


        return $this->belongsTo(MealType::class,'meal_type_id','id');

    }
}
