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
        'currency_id',
        'type',
        'status',
    ];

    protected $dates = [
       'start',
        'end'
    ];


    public function meal_type(){

        return $this->belongsToMany(MealType::class,'meal_type_packages','package_id','meal_type_id','id','id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id','id');
    }

}
