<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;

class ProfileSettingsController extends Controller
{
    //
    public function show()
    {
        return view('profile.profile-settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nickname' => ['required', 'min:3'],
        ]);

        if ($request->hasFile('photo')) {
            $user = auth()->user();
            $destination_path ='public/uploads/avatars/';
            $file_name = $user->id . '.jpg';

            $request->file('photo')->move($destination_path, $file_name);

            $photo = $destination_path . $file_name;

            User::find(auth()->user()->id)->update([
                'photo'=>$photo,
            ]);
        }

        User::find(auth()->user()->id)->update([

            'phone_number'=>$request->phone_number,
            'name'=>$request->name,
            'nickname'=>$request->nickname,
        ]);

        return redirect('/dashboard');
    }
}
