<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like ($post_id)
    {
        Post::find($post_id)->likedBy()->toggle(Auth::user());
        return redirect()->back();
    }
}
