<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

use Illuminate\Support\Facades\Auth;

class PostsViews extends Model
{
    protected $table = 'posts_views';

    public static function createViewLog($post)
    {

        $postsViews = new PostsViews();
        $postsViews->id_post = $post->id;
        $postsViews->body = $post->body;
        $postsViews->url = Request::url();
        $postsViews->session_id = Request::getSession()->getId();
        $postsViews->user_id = Auth::user()->id;
        $postsViews->ip = Request::getClientIp();
        $postsViews->agent = Request::header('User-Agent');
        $postsViews->save();
    }

    public static function createViewpostpage($post)
    {

        $postsViews = new PostsViews();
        $postsViews->id_post_page = $post->id;
        $postsViews->body = $post->dis;
        $postsViews->url = Request::url();
        $postsViews->session_id = Request::getSession()->getId();
        $postsViews->user_id = Auth::user()->id;
        $postsViews->ip = Request::getClientIp();
        $postsViews->agent = Request::header('User-Agent');
        $postsViews->save();
    }


    public static function createViewprofile($profile)
    {

        $postsViews = new PostsViews();
        $postsViews->profile_id     = $profile->id;
        $postsViews->url = Request::url();
        $postsViews->session_id = Request::getSession()->getId();
        $postsViews->user_id = Auth::user()->id;
        $postsViews->ip = Request::getClientIp();
        $postsViews->agent = Request::header('User-Agent');
        $postsViews->save();
    }

    public static function createViewservies($service)
    {

        $postsViews = new PostsViews();
        $postsViews->id_service    = $service->id;
        $postsViews->url = Request::url();
        $postsViews->session_id = Request::getSession()->getId();
        $postsViews->user_id = Auth::user()->id;
        $postsViews->ip = Request::getClientIp();
        $postsViews->agent = Request::header('User-Agent');
        $postsViews->save();
    }
}
