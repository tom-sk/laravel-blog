<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphOne('App\Comment', 'commentable');
    }
}
