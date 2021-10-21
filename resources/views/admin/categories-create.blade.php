<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
						@csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Name<span class="text-red-500"></span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="name" value="" required>
                        </div>
						<div class="flex p-1">
                            <button class="border-2 border-gray-300 border-r p-2" type="submit" name="create" class="btn btn-primary">Create category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
