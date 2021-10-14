<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.users-list', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();

        return view('user.users-create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);

        return redirect('/users');
    }
}
