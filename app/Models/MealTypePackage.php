<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealTypePackage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'meal_type_id',
        'package_id',
    ];

    public function meal_type()
    {
        return $this->belongsTo(MealType::class,'meal_type_id','id');
    }
}
