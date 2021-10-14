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
                    <td><a href="/post/{{ $post->id }}" class="text-blue-500">{{  $post->title }}</a></td>
                    <td>{{ $post->preview }}</td>
                    <th>Author:</th>
                    <td><a href="/profile/{{ $post->user_id }}" class="text-blue-500">{{ $post->user->name }}</a></td>
                    <th>Updated at:</th>
                    <td>{{ $post->updated_at }}</td>
                </tr>
                @endforeach
              </table>
              {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
