<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'country', 'maker'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('recipe_name', 'iLike', '%' . $search . '%')->orWhere('ingredients', 'ilike', '%' . $search . '%');
        });


        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        });

        $query->when($filters['country'] ?? false, function ($query, $country) {
            return $query->whereHas('country', function ($query) use ($country) {
                $query->where('name', $country);
            });
        });

        $query->when(
            $filters['maker'] ?? false,
            fn ($query, $maker) =>
            $query->whereHas(
                'maker',
                fn ($query) =>
                $query->where('name', $maker)
            )
        );
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
