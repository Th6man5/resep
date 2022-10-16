<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function recipe()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
