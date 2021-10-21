<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
	{
		return view('admin.admin');
	}

	public function categoriesList() 
	{
		$categories = Category::all();

		return view('admin.categories-list', ['categories' => $categories]);
	}
}
