<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('accesses');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function accesses()
    {
        return $this->hasMany(Access::class);
    }

    // public function getConversation()
    // {
    //     return $this->accesses()->wherePivot('user_id', '=', auth()->user()->id);
    // }


    // public function getLastMessage()
    // {
    //     return $this->messages->last();
    // }

    // public function getUserId()
    // {   $query = $this->where('user_one', '=', auth()->user()->id)->exists();
    //     if (!$query) {
    //         $id = $this->user_one;
    //         return $id;

    //     } else {
    //         $id = $this->user_two;
    //         return $id;
    //     }

    // }

}
