<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBasic extends Model{

    use HasFactory;

    protected $fillable = [

      'user_id',
      'meal_id',
      'protein',
      'order_date',
    ];



    public function user(){


        return $this->belongsTo(User::class,'user_id','id');

    }


    public function meal(){

        return $this->belongsTo(Meal::class,'meal_id', 'id');
    }
}
