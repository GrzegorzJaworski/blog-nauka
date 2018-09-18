<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function show(Post $post)
    {
//        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function store()
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/');
    }
}
