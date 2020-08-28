<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table= "likes";

    public function likes()
    {

        return $this->belongsTo(Like::class, 'post_id','user_id');
    }
    public function userlike(){
        return $this->belongsTo(User::class,'user_id');
    }
    //

    public function postlike(){
        return $this->belongsTo(Post::class,'post_id');
    }

    public function pagelike(){
        return $this->belongsTo(Pages::class,'page_id');
    }



    public function pagepostlike(){
        return $this->belongsTo(Postpage::class,'post_page_id');
    }





}
