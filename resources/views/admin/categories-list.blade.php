<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
        <div>
            <form method="GET" action="{{ route('create.category') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Создать категорию</button>
            </form>
		 </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            		@foreach ($categories as $category)
                    		{{-- <td><a href="/post/{{ $post->id }}" class="text-blue-500">{{  $post->title }}</a></td> --}}
                   			
					<div class="mb-4">
						<label class="text-xl text-blue-600">{{ $category->name }}</label></br>
					</div>
                	@endforeach
        		</div>
    		</div>
		</div>
	</div>
</x-app-layout>
