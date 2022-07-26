<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserFollowed;

class FollowController extends Controller
{
    public function follow ($user_id)
    {
        $user = User::find($user_id)->setAvatar();
        if ($user) {
            $followers = $user->followedBy();
            $followers->toggle(Auth::user());
            $me = $followers->find(Auth::user());
            if ($me) {
                Mail::to($user)->send(new UserFollowed($user));
            }
        }
        return redirect()->back();
    }
}
