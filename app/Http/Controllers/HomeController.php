<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AvatarController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = AvatarController::getAvatars(
            User::select('id', 'name', 'oauth_avatar', 'avatar')->get()
        );
        $following = AvatarController::getAvatars(
            Auth::user()->following()->get()
        );
        return view('home', [
            'users' => $users,
            'posts' => Post::all()->reverse(),
            // 'image_placeholder' => Constants::IMAGE_PLACEHOLDER,
            'following' => $following,
        ]);
    }


    // public function countLikes($post_id)
    // {
    //     $post = Post::find($post_id);
    //     return $post->likedBy()->count();
    // }
}
