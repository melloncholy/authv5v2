<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
        <div class="create-post">
            <form method="GET" action="{{ route('create.post') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Создать статью</button>
            </form>
        </div>
    </x-slot>

</x-app-layout>