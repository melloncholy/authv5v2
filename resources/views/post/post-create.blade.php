<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    {{-- <form method="POST" action="{{ route('store.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="w-full md:w-1/2 px-3">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control">
			<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" placeholder="Title">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label for="preview">Preview:</label>
            <textarea placeholder="Preview" name = "preview"></textarea>
			<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="preview" type="text" placeholder="Preview">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label for="content">Text:</label>
            <textarea placeholder="Text" name = "content"></textarea>
			<input class="appearance-none block	break-words w-full md:h-64 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="text" type="text" placeholder="Text">
        </div>

		
        <div class="w-full md:w-1/2 px-3">
            <label for="tag">Tags:</label>
            <input type="placeholder" id="tag" name="tag" class="form-control">
			<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tags" type="text" placeholder="Tags">
        </div>
		
        <button type="submit"  name="action" value="save" class="btn btn-primary">Save</button>
        <button type="submit"  name="action" value="publish" class="btn btn-primary">Publish</button>
    </form> --}}

	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('store.post') }}" enctype="multipart/form-data">
						@csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Preview</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="preview" id="preview" placeholder="">
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                            <textarea name="content" class="border-2 border-gray-500">
                                
                            </textarea>
                        </div>

                        <div class="flex p-1">
                            <select class="border-2 border-gray-300 border-r p-2" name="action">
                                <option value="publish">Publish</option>
                                <option value="save">Save Draft</option>
                            </select>
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
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
