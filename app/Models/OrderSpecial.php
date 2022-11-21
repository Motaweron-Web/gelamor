<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSpecial extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'component_id',
        'protein',
        'order_date',
    ];



    public function user(){


        return $this->belongsTo(User::class,'user_id','id');

    }


    public function component(){

        return $this->belongsTo(Component::class,'component_id', 'id');
    }
}
