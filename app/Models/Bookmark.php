<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    // use HasFactory;
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function likedBy($user)
    {
        return Bookmark::where('user_id', $user->id)->where('task_id', $this->id)->exists();
    }
}
