<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

	protected $guarded = [];

	public function posts()
	{
		return $this->belongsToMany(Post::class);
	}

	// public function getTag($id)
	// {
	// 	return $this->posts->where('id', '=', $id)->all();
	// }
}
