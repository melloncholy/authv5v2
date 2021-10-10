<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowProfileController extends Controller
{
    //
    public function show()
    {
        return view('profile.profile');
    }

    public function showProfiles($id)
    {
        $user = User::find($id);
        return view('profile.user-profile', compact('user'));
    }


}
