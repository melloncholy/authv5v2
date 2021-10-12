<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        Comment::create([
            'post_id' => $id,
            'user_id' => auth()->user()->id,
            'text' => $request->text,
        ]);

        return redirect('post/' . $id);
    }
}
