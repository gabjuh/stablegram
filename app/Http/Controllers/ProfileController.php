<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Constants;
use Illuminate\Support\Facades\Storage;

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

        if (isset($user->avatar)) {
            $avatar = '/storage/'.$user->id.'/'.$user->avatar;
        } elseif (isset($user->oauth_avatar)) {
            $avatar = $user->oauth_avatar;
        } else {
            $avatar = Constants::IMAGE_PLACEHOLDER;
        }

        return view('profile', [
            'user' => $user,
            'posts' => Post::whereUserId($id)->get()->reverse(),
            'nrOfPosts' => $nrOfPosts,
            'avatar' => $avatar,
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
            $file = $request->file('avatar');
            $file_name = 'profile_image'.'.'.$file->extension();
            Storage::putFileAs('public/' .$request->user()->id, $request->file('avatar'), $file_name);
            $user->avatar = $file_name;
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
