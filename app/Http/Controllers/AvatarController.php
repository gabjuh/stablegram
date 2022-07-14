<?php

namespace App\Http\Controllers;

use App\Constants;

class AvatarController extends Controller
{
    /**
     * This method helps to control the avatars in tree different priorities.
     * The variable $user->avatar is might defined. In that case there will be no changes.
     *
     * If there was not set any avatar by the user, but a url for the third party avatar is
     * available, it copies to the place of the avatar.
     *
     * If there were none of these set, the method uses the predefined image placeholder.
     * So, there is no situation, when the profile image stays blank.
     */
    private static function checkAvatar ($user)
    {
        if (isset($user->avatar)) {
            $user->avatar = asset('storage/' .$user->avatar);
        } elseif (isset($user->oauth_avatar)) {
            $user->avatar = $user->oauth_avatar;
        } else {
            $user->avatar = Constants::IMAGE_PLACEHOLDER;
        }
        return $user;
    }

    /**
     * This method is waiting for a single user object, and returns a modified one.
    */
    public static function getAvatar ($user)
    {
        return static::checkAvatar($user);
    }

    /**
     * This method is waiting for an array of multiple users, checks and modify them,
     * and returns the modified array.
     */
    public static function getAvatars ($users)
    {
        foreach($users as $user) {
            $user = static::checkAvatar(($user));
        }
        return $users;
    }
}
