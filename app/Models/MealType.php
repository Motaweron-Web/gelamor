<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealType extends Model{

    use HasFactory;

    protected $fillable = [

        'name',
        'details',
        'package_id'


    ];



    public function package(){

        return $this->belongsTo(Package::class,'package_id','id');

    }

    public function meals(){

        return $this->hasMany(Meal::class,'meal_type_id','id');

    }
}


