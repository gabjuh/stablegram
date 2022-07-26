<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{

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
        $user->setAvatar();

        $followedByCurrentUser = $user->followedBy()->find(Auth::user()) !== null;
        $followers = $user->followedBy()->count();
        $following = $user->following()->count();

        return view('profile', [
            'user' => $user,
            'posts' => Post::whereUserId($id)->get()->reverse(),
            'followers' => $followers,
            'following' => $following,
            'nrOfPosts' => $nrOfPosts,
            'followedByCurrentUser' => $followedByCurrentUser,
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
}
