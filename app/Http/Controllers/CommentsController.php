<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
//        $post->addComment(request('body'));

        auth()->user()->addComment(
            new Comment([
                'post_id' => $post->id,
                'body' => request('body')
                ])
        );

        return back();
    }
}
