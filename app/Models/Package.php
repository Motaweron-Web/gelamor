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
        'type',
        'status',
        'payment_method',
    ];

    protected $dates = [
       'start',
        'end'
    ];


    public function meal_type(){

        return $this->belongsToMany(MealType::class,'meal_type_packages','meal_type_id','package_id ','id','id');
    }

}
