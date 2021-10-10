<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>
@foreach ($messages as $message)
    <li>
        <a href="/profile/{{ $message->user->id }}"> {{ $message->user->nickname }} </a>
        <p>{{ $message->message }}</p>
        <form method="POST" action="{{ route('messages.delete') }}">
            @csrf
            <input type = "hidden" name = "conversationId" value = "{{ $conversation_id }}">
            <input type = "hidden" name = "messageId" value = "{{ $message->id }}">
            <input type = "hidden" name = "myId" value = "{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Удалить сообщение</button>
        </form>
    </li>
@endforeach
<form method="POST" action="{{ route('messages.send') }}">
    @csrf
    <textarea placeholder="Ваше сообщение" name = "message"></textarea>

    <input type = "hidden" name = "conversationId" value = "{{ $conversation_id }}">
    <input type = "hidden" name = "myId" value = "{{ auth()->user()->id }}">
    <button type="submit" class="btn btn-primary">Отправить сообщение</button>
</form>
</x-app-layout>
