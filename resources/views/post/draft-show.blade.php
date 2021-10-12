<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Draft') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="user-information h-2">
            <table>
                <tr>
                    <td>{{ $showDraft->title }}</td>
                    <td>{{ $showDraft->content_html }}</td>
                    <td><a href="{{ $showDraft->id }}/edit">Edit</a></td>
                    <td><a href="{{ route('publish.draft', $showDraft->id)}}" class="btn btn-warning">Publish</a></td>
                </tr>
              </table>
        </div>
    </div>
</x-app-layout>
