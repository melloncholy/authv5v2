<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Draft') }}
        </h2>
        <div class="list-draft">
            <form method="GET" action="{{ route('create.post') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Создать статью</button>
            </form>
        </div>
    </x-slot>

    <div class="content">
        <div class="user-information h-2">
            <table>
                @foreach ($drafts as $draft)
                <tr>
                <td><a href="/draft/{{ $draft->id }}">{{  $draft->title }}</a></td>
                    <td>{{ $draft->preview }}</td>
                </tr>
                @endforeach
              </table>
              {{ $drafts->links() }}
        </div>
    </div>
</x-app-layout>
