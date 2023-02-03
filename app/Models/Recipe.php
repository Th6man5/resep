<?php

namespace App\Models;


use App\Models\Country;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('recipe_name', 'iLike', '%' . $search . '%')
                ->orWhere('ingredients', 'iLike', '%' . $search . '%')
                ->orWhereHas('maker', function ($query) use ($search) {
                    $query->where('name', 'iLike', '%' . $search . '%')->orWhere('username', 'iLike', '%' . $search . '%');
                })->orWhereHas('country', function ($query) use ($search) {
                    $query->where('name', 'iLike', '%' . $search . '%');
                })->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'iLike', '%' . $search . '%');
                });
        });
    }



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



    public function getRouteKeyName()
    {
        return 'id';
    }

    // public function getIsAdminAttribute()
    // {
    //     return $this->roles()->where('name', 'user')->exists();
    // }

    public function incrementReadCount()
    {
        $this->reads++;
        return $this->save();
    }
}
