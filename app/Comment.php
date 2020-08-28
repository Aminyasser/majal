<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'post_id', 'body', 'user_id', 'user_name','created_at', 'updated_at'
    ];

    public function post()
    {

        return $this->belongsTo(Post::class, 'post_id','user_id');
    }

    public function usercomment()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postcomment()
    {
        return $this->belongsTo(post::class, 'post_id');
    }


    public function commentpostpage()
    {
        return $this->belongsTo(Postpage::class, 'post_page_id');
    }
}
