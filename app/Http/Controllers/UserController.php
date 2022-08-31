<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user)
    {
        $posts = $user->posts()->paginate(2);

        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
