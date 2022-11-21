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
        'meal_id'
        ];


    public function meal(){

        return $this->belongsTo(Meal::class,'meal_id', 'id');
    }


    public function order_special(){

        return $this->hasMany(OrderSpecial::class,'component_id', 'id');
    }
}
