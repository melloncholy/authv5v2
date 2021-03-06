<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Mark;
use Illuminate\Support\Facades\DB;
//use Michelf\Markdown;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::where('is_published', '=', 1)
			->with(['user'])
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('post.post-list', compact('posts'));
    }

    public function create()
    {
        return view('post.post-create');
    }

    public function store(Request $request)
	{   
		// $post_html = Markdown::defaultTransform($request->content);
		
        switch ($request->input('action')) {
            case 'save':
                Post::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'content_html' => $request->content,
                    'preview' => $request->preview,
                    'user_id' => auth()->user()->id,
                ]);
				
				$tags = explode("#", $request->tag);

				foreach ($tags as $tag) {
					$query = Tag::where('name', '=', $tag)->exists();

					if (!$query) {
						Tag::create([
							'name' => $tag,
						]);
					}
					
					$tag_id = Tag::where('name', '=', $tag)
						->first();
					$post_id = Post::pluck('id')
            			->last();
					
					DB::table('post_tag')->insert([
						'post_id' => $post_id,
						'tag_id' => $tag_id->id, 
					]);
					
				}
				
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

				$tags = explode("#", $request->tag);

				foreach ($tags as $tag) {
					$query = Tag::where('name', '=', $tag)->exists();

					if (!$query) {
						Tag::create([
							'name' => $tag,
						]);
					}
					
					$tag_id = Tag::where('name', '=', $tag)
						->first();
					$post_id = Post::pluck('id')
            			->last();
					
					DB::table('post_tag')->insert([
						'post_id' => $post_id,
						'tag_id' => $tag_id->id, 
					]);
					
				}
                break;
        }
        return redirect('/post');
    }

    public function show($id)
    {

        $post = Post::find($id);
		
        $this->authorize('view', $post);
        $comments = Comment::where('post_id', '=', $post->id)
            ->get();
        $likes = Mark::where('post_id', '=', $id)
            ->where('likes', '=', 1)
            ->count();
        $dislikes = Mark::where('post_id', '=', $id)
            ->where('dislikes', '=', 1)
            ->count();

			
        return view('post.post-show', compact('post', 'comments', 'likes', 'dislikes'));
    }

    public function showUnpublished()
    {
        $this->authorize('showUnpublished', Post::class);

        $posts = Post::where('is_published', '=', 0)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('post.unpublished-post-list', compact('posts'));
    }

    public function publish($id)
    {
        $post = Post::find($id);
        $post->is_published = 1;
        $post->save();

        return redirect('post/moderation');
    }

	public function toTag($tag)
	{

		$posts = Post::where('is_published', '=', 1)
			->with(['user'])
			->whereHas('tags', function ($query) use ($tag) {
				$query->where('name', 'like', $tag);
			})
            ->orderBy('published_at', 'desc')
            ->paginate(10);

		return view('post.to-tag', ['posts' => $posts]);
	}
}
