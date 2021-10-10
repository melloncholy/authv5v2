<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::where('is_published', '=', 1)
            ->get();
        return view('post.post-list', compact('posts'));
    }

    public function create()
    {
        return view('post.post-create');
    }

    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'save':
                Post::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'content_html' => $request->content,
                    'preview' => $request->preview,
                    'user_id' => auth()->user()->id,
                ]);
                break;

            case 'publish':
                Post::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'content_html' => $request->content,
                    'preview' => $request->preview,
                    'user_id' => auth()->user()->id,
                    'is_moderated' => 1,
                ]);
                break;
        }
        return redirect('post/');
    }
}
