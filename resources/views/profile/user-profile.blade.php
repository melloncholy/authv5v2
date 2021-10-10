<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
<div class="container">
    <div class="user-information h-2">
        <h3>О пользователе:</h3>
        <table class="table-auto">
            <tr>
                <th>Фото профиля:</th>
                <td><p><img src="/{{ $user->photo }}" width="300" height="300" alt="фото профиля"></p></td>
            </tr>
            <tr>
              <th>Отображаемое имя:</th>
              <td>{{ $user->nickname }}</td>
            </tr>
            <tr>
              <th>Имя:</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Номер телефона:</th>
                <td>{{ $user->phone_number }}</td>
            </tr>
          </table>
    </div>
</div>


</x-app-layout>
