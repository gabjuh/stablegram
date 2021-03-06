<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'oauth_avatar',
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

    public function oauth()
    {
        return $this->hasOne('App\Models\SocialAuth');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_user_id', 'followed_user_id');
    }

    public function followedBy()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'follower_user_id');
    }
}
