<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <form method="POST" action="/draft/{{ $item->id }}/update" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $item->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="preview">Preview:</label>
            <textarea placeholder="Preview" name = "preview">{{ $item->preview }}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Text:</label>
            <textarea placeholder="Text" name = "content">{{ $item->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="tag">Tags:</label>
            <input type="placeholder" id="tag" name="tag" value="{{ $item->tag }}" class="form-control">
        </div>
        <button type="submit"  name="action" value="save" class="btn btn-primary">Save</button>
    </form>
</x-app-layout>
