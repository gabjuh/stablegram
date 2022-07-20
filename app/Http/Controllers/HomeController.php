<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants;
use App\Models\Post;
use App\Models\User;
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
        $users = User::select('id', 'name', 'oauth_avatar', 'avatar')->get();
        $users = AvatarController::getAvatars($users);
        return view('home', [
            'users' => $users,
            'posts' => Post::all()->reverse(),
            'image_placeholder' => Constants::IMAGE_PLACEHOLDER,
        ]);
    }


    // public function countLikes($post_id)
    // {
    //     $post = Post::find($post_id);
    //     return $post->likedBy()->count();
    // }
}
