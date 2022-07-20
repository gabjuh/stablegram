<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Constants;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AvatarController;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nrOfPosts = Post::whereUserId($id)->count('post_id');
        $user = User::findOrFail($id);
        // $user = AvatarController::getAvatar($user);

        // $posts = Post::find(['user_id' => $id]);
        $nrOfLikes = 12; // $post ? $post->likedBy()->count() : 0;
        $likedByAuthUser = 23; // $post ? $post->likedBy()->find(Auth::user()->id) : null;

        $followedByCurrentUser = $user->followedBy()->find(Auth::user()) !== null;
        $followers = $user->followedBy()->count();
        $following = $user->following()->count();
        // $followedByCurrentUser = Auth::user()->following->all();
        // dd($followedByAuthUser);Auth::user()

        return view('profile', [
            'user' => $user,
            'posts' => Post::whereUserId($id)->get()->reverse(),
            'followers' => $followers,
            'following' => $following,
            'nrOfPosts' => $nrOfPosts,
            'likedByAuthUser' => $likedByAuthUser,
            'followedByCurrentUser' => $followedByCurrentUser,
            'nrOfLikes' => $nrOfLikes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::whereUserId(Auth::user()->id)->get();
        return view('edit_profile', [
            'username' => Auth::user()->name,
            'posts' => $posts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }
        $user->save();
        return redirect()->to('/profile/' .$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
