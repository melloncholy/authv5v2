<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        // Validate the new password length...
        $request->validate([
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        return redirect('/dashboard');
    }
}


