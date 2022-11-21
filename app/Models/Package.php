<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;


    protected $fillable = [

        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'start',
        'end',
        'price',
        'currency_ar',
        'currency_en',
        'status'


    ];

    public function meal_type(){

        return $this->hasMany(MealType::class,'package_id','id');

    }

}
