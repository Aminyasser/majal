<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'user_name', 'image', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userpost()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->belongsTo(User::class, 'post_id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentspostpage()
    {
        return $this->hasMany(Comment::class);
    }

    public function postsavsed()
    {
        return $this->belongsTo(Saveds::class);
    }

    public function usersavsed()
    {
        return $this->belongsTo(Saveds::class,'user_id');
    }

    public function postlikes()
    {
        return $this->hasMany(Like::class);
    }



    public function postlikesuser()
    {
        return $this->hasMany(User::class,'user_id');
    }

    public function viewpost()
    {
        return $this->hasMany(PostsViews::class, 'id_post');
    }
}
