<?php

namespace App\Models;

use App\Http\Controllers\MessagesController;
use GuzzleHttp\Psr7\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'phone_number',
        'email',
        'password',
        'facebook_id',
        'google_id',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages()
    {
        return $this->belongsTo(Message::class);
    }

    public function conversations() {
        return $this->belongsToMany(Conversation::class, 'accesses');
    }

    public function getUserName($id) {
        return $this->find($id)->first();
    }
}

