<?php

namespace App;

class Comment extends Model
{
    function post()
    {
        return $this->belongsTo(Post::class);
    }
}
