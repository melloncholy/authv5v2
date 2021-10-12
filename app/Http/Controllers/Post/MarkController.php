<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function like($id)
    {
        $query = Mark::where('user_id', '=', auth()->user()->id)
            ->where('post_id', '=', $id)
            ->where(function($query) {
                $query->where('likes', '=', 1)
                    ->orWhere('dislikes', '=', 1);
            })
            ->exists();

        if (!$query) {
            Mark::create([
                'post_id' => $id,
                'user_id' => auth()->user()->id,
                'likes' => 1,
                ]);
        } else {
            return redirect('post/' . $id);
        }

        return redirect('post/' . $id);
    }

    public function dislike($id)
    {
        $query = Mark::where('user_id', '=', auth()->user()->id)
            ->where('post_id', '=', $id)
            ->where(function($query) {
                $query->where('likes', '=', 1)
                    ->orWhere('dislikes', '=', 1);
            })
            ->exists();

        if (!$query) {
            Mark::create([
                'post_id' => $id,
                'user_id' => auth()->user()->id,
                'dislikes' => 1,
                ]);
        } else {
            return redirect('post/' . $id);
        }

        return redirect('post/' . $id);
    }
}
