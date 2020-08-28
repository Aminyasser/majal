<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postpage extends Model
{
    //
    protected $table = 'postpage';

    public function pagename()
    {
        return $this->belongsTo(Pages::class, 'page_id');
    }

    public function postlike()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    public function pagepostlike()
    {
        return $this->hasMany(Like::class, 'post_page_id');
    }


    public function commentpostpage()
    {

        return $this->hasMany(Comment::class, 'post_page_id');
    }

    public function viewpostpage()
    {
        return $this->hasMany(PostsViews::class, 'id_post_page');
    }
}
