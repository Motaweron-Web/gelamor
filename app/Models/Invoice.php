<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'invoice_date'

    ];


    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }


    //الفاتوره لها كذه وجبه
    public function meals(){

        return $this->belongsToMany(Meal::class,'orders','invoice_id','meal_id','id','id')->withTimestamps();
    }
    //الفاتوره لها كذه وجبه
    public function details(){

        return $this->hasMany(Order::class,'invoice_id','id');
    }


}
