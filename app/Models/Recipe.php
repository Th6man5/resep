<?php

namespace App\Models;


use App\Models\User;
use App\Models\Country;
use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_name', 'about', 'image', 'portion', 'time', 'steps', 'ingredients', 'category_id', 'country_id', 'user_id'];

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

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    protected static function booted()
    {
        static::deleted(function ($recipe) {
            if ($recipe->image) {
                Storage::delete($recipe->image);
            }
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

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function averageRating()
    {
        return $this->ratings()->average('rating');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    //Delete report jika resep hapus
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($recipe) {
            $recipe->reports()->delete();
        });
    }
}
