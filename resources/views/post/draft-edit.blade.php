<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Draft') }}
        </h2>
    </x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<form method="POST" action="{{ route('update.draft', ['id' => $item->id ]) }}" enctype="multipart/form-data">
					@csrf
					<div class="mb-4">
						<label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
						<input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{ $item->title }}" required>
					</div>
					<div class="mb-4">
						<label class="text-xl text-gray-600">Preview</label></br>
						<input type="text" class="border-2 border-gray-300 p-2 w-full" name="preview" id="preview" value="{{ $item->preview }}">
					</div>
					<div class="mb-8">
						<label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
						<textarea name="content" class="border-2 border-gray-500">
							{{ $item->content }}
						</textarea>
					</div>
					<div class="mb-4">
						<label class="text-xl text-gray-600">Tags</label></br>
						<input type="text" class="border-2 border-gray-300 p-2 w-full" name="tag" id="tag">
					</div>
					<button class="border-2 border-gray-300 border-r p-2" type="submit"  name="action" value="save" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'content', {
	removePlugins: 'sourcearea, about',
} );
</script>
</x-app-layout>
