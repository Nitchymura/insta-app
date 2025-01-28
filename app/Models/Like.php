<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false; //no timestamps

    //like belongs to user
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function post(){
        return $this->belongsTo(Post::class)->withTrashed();
    }
}

