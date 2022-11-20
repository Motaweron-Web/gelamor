<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Chef extends Authenticatable implements JWTSubject{


    use HasFactory;

    protected $table = 'chefs';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function getJWTIdentifier(){


        return $this->getKey();
    }

    public function getJWTCustomClaims(){


        return [];
    }
}
