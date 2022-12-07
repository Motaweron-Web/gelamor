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
        'name',
        'location',
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



    public function invoices(){


        return $this->hasMany(Invoice::class,'user_id','id');
    }



    public function order_special(){

        return $this->hasMany(OrderSpecial::class,'user_id','id');
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }


}
