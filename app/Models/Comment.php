<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //comment belongs to user
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function post(){
        return $this->belongsTo(Post::class)->withTrashed();
    }

}
