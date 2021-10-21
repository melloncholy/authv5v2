<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                            <label class="text-3xl text-gray-600">{{ $post->title }}</label></br>
                    </div>

                    <div class="mb-4">
                            <label class="text-xl text-blue-600"><a href="/profile/{{ $post->user_id }}">{{ $post->user->name }}</a></label></br>
                    </div>

                    <div class="mb-8">
                        <label class="text-xl text-gray-600">{!! $post->content !!}</label></br>
					</div>
					@foreach ($post->tags as $tag)
					<div class="bg-blue-100 inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
						<a href="/search/{{ $tag->name }}"><span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1" x-text="tag">{{ $tag->name }}</span></a>
					</div>
					@endforeach	
					

					@if($post->is_published == 1)
					<div class="mb-8">
                        <label class="text-xl text-gray-600">{{ $post->published_at }}</label></br>
					</div>
					<a href="{{ route('like.post', ['id' => $post->id]) }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Likes:{{ $likes }}
                    </a>
                    <a href="{{ route('dislike.post', ['id' => $post->id]) }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Dislikes:{{ $dislikes }}
                    </a></br>
					
                    @else
                    <a href="{{ route('publish.post', ['id' => $post->id]) }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Publish
                    </a></br>
					@endif
                </div>
           
	@if ($post->is_published == 1)
    <form method="POST" action="{{ route('send.comment', ['id' => $post->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="text" id="text" placeholder="">
        </div>
        <button class="border-2 border-gray-300 border-r p-2" type="submit" name="send" class="btn btn-primary">Send</button>
    </form>
	@endif
    <div class="comments">
        <table class="table-fixed">
            @foreach ($comments as $comment)
				<div class="p-6 border-b border-gray-200">
					<div class="mb-1">
						<label class="text-l text-blue-600"><a href="/profile/{{ $comment->user_id }}">{{ $comment->user->name }}</a></label></br>
					</div>
					<div class="mb-1">
						<label class="text-l text-gray-600">{{ $comment->text }}</label></br>
					</div>
					<div class="mb-1">
						<label class="text-l text-gray-600">{{ $comment->created_at }}</></label></br>
					</div>
				</div>
            @endforeach
          </table>
    </div>
</div>
</div>
</div>
</x-app-layout>
