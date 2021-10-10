<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>
<form method="POST" action="{{ route('create.form-conversation') }}">
    @csrf
    <textarea placeholder="Тема беседы" name = "title"></textarea>
    <textarea placeholder="Участники, через пробел" name = "participants"></textarea>
    <textarea placeholder="Ваше сообщение" name = "message"></textarea>
    <input type = "hidden" name = "userId" value = "{{ auth()->user()->id }}">
    <button type="submit" class="btn btn-primary">Создать беседу</button>
</form>
</x-app-layout>
