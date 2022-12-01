<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo(User::class, 'user_id','id');
    }

    public function meal()
    {
        $this->belongsTo(Meal::class, 'meal_id','id');
    }
}
