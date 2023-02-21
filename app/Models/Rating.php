<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function getAverageRatingAttribute()
    {
        return Rating::where('recipe_id', $this->id)->avg('rating');
    }
}
