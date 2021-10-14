<x-app-layout>
    <x-slot name="header">

    </x-slot>
<form method="POST" action="{{ route('create.user') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="role_id">Role:</label>
        <select id="role_id" name="role_id" class="form-control">
            <option value="">-- select --</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Создать пользователя</button>
</form>
</x-app-layout>
