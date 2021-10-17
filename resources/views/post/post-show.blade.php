<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="post-content">
            <table class="table-fixed">
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content_html }}</td>
                    <th>Author:</th>
                    <td><a href="/profile/{{ $post->user_id }}">{{ $post->user->name }}</a></td>
                    @if ($post->is_published == 1)
                    <td>
                        <a href="{{ route('like.post', ['id' => $post->id]) }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Likes:{{ $likes }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('dislike.post', ['id' => $post->id]) }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Dislikes:{{ $dislikes }}
                        </a>
                    </td>
                    <th>Published at:</th>
                    <td>{{ $post->published_at }}</td>
                    @else
                    <td>
                        <a href="{{ route('publish.post', ['id' => $post->id]) }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Publish
                        </a>
                    </td>
                    @endif
                </tr>
              </table>
        </div>
    </div>
    <form method="POST" action="{{ route('send.comment', ['id' => $post->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea placeholder="Send Comment" name = "text"></textarea>
        </div>
        <button type="submit" name="send" class="btn btn-primary">Send</button>
    </form>
    <div class="comments">
        <table class="table-fixed">
            @foreach ($comments as $comment)
                <tr>
                    <td><a href="/profile/{{ $comment->user_id }}">{{ $comment->user->name }}</a></td>
                    <td>{{ $comment->text }}</td>
                    <td>{{ $comment->created_at }}</td>
                </tr>
            @endforeach
          </table>
    </div>
</x-app-layout>
