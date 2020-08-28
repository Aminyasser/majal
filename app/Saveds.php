<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saveds extends Model
{
    //
    protected $table = 'saveds';

    public function postsavsed()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
