<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //category has many category_post
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }
}
