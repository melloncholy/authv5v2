<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
        <div class="show-post">
            <form method="GET" action="{{ route('create.post') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Создать статью</button>
            </form>
        </div>
    </x-slot>

    <div class="content">
        <div class="user-information h-2">
            <table>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->preview }}</td>
                    <th>Author:</th>
                    <td>{{ $post->user_id }}</td>
                    <th>Likes:</th>
                    <td>{{ $post->likes }}</td>
                    <th>Dislikes:</th>
                    <td>{{ $post->dislikes }}</td>
                    <th>Published at:</th>
                    <td>{{ $post->published_at }}</td>
                </tr>
                @endforeach
              </table>
        </div>
    </div>
</x-app-layout>
