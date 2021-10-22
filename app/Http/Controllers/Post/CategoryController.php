<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
	{
		$categories = Category::all();
	}

	public function create()
	{
		return view('admin.categories-create');
	}

	public function store(Request $request)
	{
		Category::create([
			'name' => $request->name,
		]);

		return redirect('/admin/categories');
	}

	public function edit($id)
	{	
		$category = Category::find($id);
		//dd($category);

		return view('admin.categories-edit', ['category' => $category]);
	}
}
