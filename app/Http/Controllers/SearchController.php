<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function searchUser($name) {
        $users = User::where('name', $name)->all();

    }
}
