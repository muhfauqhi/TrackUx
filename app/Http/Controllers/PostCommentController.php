<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate(request(), [
            'message' => 'required'
        ]);

        $post->comments()->create(array_merge(
            $request->only('message'),['user_id' => auth()->id()]));

        return redirect()->back();
    }
}
