<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function bookmarks()
    {
        return $this->hasMany('App\Models\Bookmark');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
