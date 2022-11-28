<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject{

    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [


        'name_ar',
        'name_en',
        'location_ar',
        'location_en',
        'img',
        'is_active',
        'country_id',
        'phone',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier(){


        return $this->getKey();
    }

    public function getJWTCustomClaims(){


        return [];
    }



    public function meal(){

        return $this->belongsToMany(Meal::class,'orders','user_id','meal_id','id','id');
    }



    public function order_special(){

        return $this->hasMany(OrderSpecial::class,'user_id','id');
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }


}
