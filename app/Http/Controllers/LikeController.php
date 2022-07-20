<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like ($post_id)
    {
        // $post = Post::find($post_id);
        // $post->likedBy()->count();
        // $likedBy = $post->likedBy()->find(Auth::user()->id);
        Post::find($post_id)->likedBy()->toggle(Auth::user());
        return redirect()->back();
    }
}
