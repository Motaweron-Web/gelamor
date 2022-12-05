<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    protected $guard = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id','id');
    }
}
