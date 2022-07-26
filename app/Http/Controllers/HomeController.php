<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $users = User::setAvatars(
            User::select('id', 'name', 'oauth_avatar', 'avatar')
            ->get()
        );
        $following = User::setAvatars(Auth::user()->following()->get());
        return view('home', [
            'users' => $users,
            'posts' => Post::all()->reverse(),
            'following' => $following,
        ]);
    }
}
