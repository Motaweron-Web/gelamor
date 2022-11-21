<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSpecial extends Model{


    use HasFactory;

    protected $fillable = [

        'user_id',
        'meal_type_id',
        'component_id',
        'date_of_order',
        'protein'

    ];


    public function user(){

        return $this->belongsTo(User::class,'user_id', 'id');
    }


    public function meal_type(){

        return $this->belongsTo(MealType::class,'meal_type_id', 'id');

    }


    public function component(){

        return $this->belongsTo(Component::class,'component_id', 'id');

    }




}
