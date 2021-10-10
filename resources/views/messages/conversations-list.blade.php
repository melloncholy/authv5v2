<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
        <div class="send-messages">
            <form method="GET" action="{{ route('create.conversation') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Создать беседу</button>
            </form>
        </div>
    </x-slot>

    @foreach ($conversations as $conversation)
    <li>
        <a href="/messages/{{ $conversation->id }}">{{  $conversation->title  }}</a>
    </li>
    @endforeach
</x-app-layout>

