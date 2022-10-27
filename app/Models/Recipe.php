<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function maker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function ingredient()
    // {
    //     return $this->belongsToMany(Ingredients::class);
    // }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
