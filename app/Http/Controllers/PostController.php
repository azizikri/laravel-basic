<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $data['user_id'] = auth()->id();
        $data['slug'] = str()->slug($data['title']);

        $thumbnail = $request->file('thumbnail')->store('thumbnails/post');
        $data['thumbnail'] = $thumbnail;
        $post = Post::create($data);

        return redirect()->route('home');
    }
}
