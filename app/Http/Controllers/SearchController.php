<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\AvatarController;

class SearchController extends Controller
{
    public function searchUser(Request $request) {
        $name = $request->post('search_user');
        $users = AvatarController::getAvatars(
            User::where('name', 'LIKE', '%' . $name . '%')->get()
        );
        return view('user_search', [
            'users' => $users,
            'name' => $name,
        ]);
    }
}
