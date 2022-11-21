<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'name_ar',
        'name_en',
        'protein',
        'calories',
        'fats',
        'carbohydrates',
        ];
}
