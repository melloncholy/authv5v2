<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        <div class="create-users">
            <form method="GET" action="{{ route('create.user') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Создать пользователя</button>
            </form>
        </div>
    </x-slot>
<div class="container">
    <div class="user-information h-2">
        <table>
            @foreach ($users as $user)
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
                <th>Name:</th>
                <td>{{ $user->name }}</td>
                <th>Role:</th>
                <td>{{ $user->role->name }}</td>
            </tr>
            @endforeach
          </table>
          {{ $users->links() }}
    </div>
</div>

</x-app-layout>
