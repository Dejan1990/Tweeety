<?php

namespace App\Models;

use App\Followable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        /*if (isset($value)) { //if ($value)
            return asset('storage/' . $value );
        }
        return asset('images/default-avatar.jpeg');*/

        return asset($value ? 'storage/'.$value : 'images/default-avatar.jpeg');
        
    }

    public function getPathAttribute()
    {
        return route('profile', $this);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function timeline()
    {
        //return Tweet::where('user_id', $this->id)->latest()->get();
        //return $this->tweets()->latest()->get();
        return Tweet::whereIn('user_id', $this->follows->pluck('id'))
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->orderByDesc('id')
            ->paginate(50);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
