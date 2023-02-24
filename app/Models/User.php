<?php

namespace App\Models;

use App\Models\Recipe;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('name', 'iLike', '%' . $search . '%')
                ->orWhere('username', 'iLike', '%' . $search . '%')
                ->orWhere('email', 'iLike', '%' . $search . '%');
        });
    }



    protected $guarded = ['id'];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function Recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function maker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function editUser()
    {
        return view('dashboard.userdashboard.profile.edit')->with('user', Auth::user());
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
