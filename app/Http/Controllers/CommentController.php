<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post, CommentStoreRequest $request)
    {
        $post->createComment($request->all());

        return redirect()->back()->with('message', "Your comment successfully send.");
    }
}

