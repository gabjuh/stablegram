<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Constants;

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

    /**
     * This method helps to control the avatars in three different priorities.
     * The variable $user->avatar is might defined. In that case there will be no changes.
     *
     * If there was not set any avatar by the user, but a url for the third party avatar is
     * available, it copies to the place of the avatar.
     *
     * If there were none of these set, the method uses the predefined image placeholder.
     * So, there is no situation, when the profile image stays blank.
     */
    public function setAvatar ()
    {
        if (isset($this->avatar)) {
            $this->avatar = asset('storage/' .$this->avatar);
        } elseif (isset($this->oauth_avatar)) {
            $this->avatar = $this->oauth_avatar;
        } else {
            $this->avatar = Constants::IMAGE_PLACEHOLDER;
        }
        return $this;
    }

    /**
     * The same as before, but loops through an array of objects.
    */
    public static function setAvatars ($users)
    {
        foreach($users as $user) {
            $user->setAvatar();
        }
        return $users;
    }
}
