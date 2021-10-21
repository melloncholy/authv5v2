<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<div class="relative mb-4">
						<label class="text-2xl text-blue-600">Categories</label>
						<a href="/admin/categories" class="absolute bottom-0 right-10 border-2 border-gray-300 border-r py-2 px-4 rounded-lg bg-primary" name="editCategories" class="btn btn-primary">Edit</a><br>
					</div>
					<div class="relative mb-4">
						<label class="text-2xl text-blue-600">Users</label>
						<a href="/admin/users" class="absolute bottom-0 right-10 border-2 border-gray-300 border-r py-2 px-4 rounded-lg bg-primary" name="editUsers" class="btn btn-primary">Edit</a><br>
					</div>
					<div class="relative mb-4">
						<label class="text-2xl text-blue-600">Moderation</label>
						<a href="/admin/moderation" class="absolute bottom-0 right-10 border-2 border-gray-300 border-r py-2 px-4 rounded-lg bg-primary" name="editPosts" class="btn btn-primary">Edit</a><br>
					</div>
				</div>
			</div>
		</div>
	</div>		
</x-app-layout>
