<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow ($user_id)
    {
        User::find($user_id)->followedBy()->toggle(Auth::user());
        return redirect()->back();
    }
}
