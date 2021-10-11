<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function index()
    {
        $drafts = Post::where('is_published', '=', 0)
            ->where('is_moderated', '=', 0)
            ->where('user_id', '=', auth()->user()->id)
            ->get();
        return view('post.draft-list', compact('drafts'));
    }

    public function show($id)
    {
        $showDraft = Post::find($id);
        return view('post.draft-show', compact('showDraft'));
    }

    public function edit($id)
    {
        $item = Post::find($id);
        return view('post.draft-edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $draft = Post::find($id);
        $draft->title = $request->title;
        $draft->preview = $request->preview;
        $draft->content = $request->content;
        $draft->content_html = $request->content;
        $draft->save();
        return redirect('/post/draft/');
    }
}
