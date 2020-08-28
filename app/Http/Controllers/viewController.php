<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Saveds;
use App\Friends;
use App\Move;
use App\Playlists;
use App\Like;
use App\Postpage;
use App\comment;
use App\Musics;
use App\Pages;
use App\Services;
use App\PostsViews;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // show post
    public function show(Post $post)
    {
        $post = Post::find($post)->first();
        if ($post) {

            $view =  PostsViews::where(['user_id' => Auth::id(), 'id_post' => $post->id])->first();

            if (!$view) {

                PostsViews::createViewLog($post);
            }
            $likeAuth = Like::where(['user_id' => Auth::id(), 'post_id' => $post->id])->first();

            $saveAuth = Saveds::where(['user_id' => Auth::id(), 'post_id' => $post->id])->first();

            $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // posts

            $users = User::whereNotIn('id', $friendsId)->where('id', '!=', Auth::id())->limit(5)->get();

            $Roundmpost1 = Post::where('user_id', $post->user_id)->limit(1)->first();

            $Roundmpost2 = Post::where('user_id', $post->user_id)->limit(1)->first();

            $CheckNot =  Auth::user()->unreadnotifications->pluck('data')->first();

            return view('home.forum-post-view', compact('post', 'likeAuth', 'saveAuth', 'users', 'Roundmpost1', 'Roundmpost2'));
        } else {
            return redirect('/')->with('message', 'قم بتسجيل الدخول ثانيا');
        }
    }

    // profile user auth
    public function index($name)
    {

        $profile_id = User::find(Auth::id());
        if ($profile_id) {

            $view =  PostsViews::where(['user_id' => Auth::id(), 'profile_id' => $profile_id->id])->first();

            if (!$view) {
                // return 'hi';
                PostsViews::createViewprofile($profile_id);
            }

            $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // following

            // $unfollowid = Friends::where('user', Auth::id())->pluck('id')->toArray();  // Un follow

            // $MyFollowingFriends = Friends::whereIn('id', $unfollowid)->pluck('id','friend')->toArray();

            $following = User::whereIn('id', $friendsId)->get(); // users following

            $followingusers = User::whereIn('id', $friendsId)->get(); // users following


            $savedId = Saveds::where('user_id', Auth::id())->pluck('post_id')->toArray();  // following

            $mysavedspost = Post::whereIn('id', $savedId)->get(); // users following

            $followId = Friends::where('friend', Auth::id())->pluck('user')->toArray();  // followrs

            $followers = User::whereIn('id', $followId)->get(); // users followrs

            $followrsusers = User::whereIn('id', $followId)->get(); // users followers

            $viewwId = PostsViews::where('profile_id', Auth::id())->pluck('profile_id')->toArray();  // followrs

            $viewusers = User::whereIn('id', $viewwId)->get(); // users followrs

            $posts = Post::where('user_id', Auth::id())->get();

            $likes = Like::select('post_id')->where('user_id', Auth::user()->id)->get();

            $likeArr = array_flatten($likes->toArray()); // end like

            return view('home.my-profile-feed', compact('posts', 'likeArr', 'mysavedspost', 'viewusers', 'followrsusers', 'following', 'followingusers', 'MyFollowingFriends', 'followers'));
        } else {
            return redirect('/');
        }
    }

    // show user profile
    public function user($id, $name)
    {
        $profile_id   = User::find($id);
        if ($profile_id) {

            $view =  PostsViews::where(['user_id' => Auth::id(), 'profile_id' => $profile_id->id])->first();

            if (!$view) {
                // return 'hi';
                PostsViews::createViewprofile($profile_id);
            }

            $friendsId = Friends::where('user', $profile_id->id)->pluck('friend')->toArray();  // following

            $followings = User::whereIn('id', $friendsId)->count(); // users following

            $friendsfollowId = Friends::where('friend', $profile_id->id)->pluck('user')->toArray();  // following

            $followers = User::whereIn('id', $friendsfollowId)->count(); // users following

            $friendAuth = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // following

            $newusers = User::whereNotIn('id', $friendAuth)->where('id', '!=', Auth::id())->inRandomOrder()->limit(5)->get(); // users

            $likes = Like::select('post_id')->where('user_id', Auth::user()->id)->get();

            $likeArr = array_flatten($likes->toArray()); // end like


            $saveds = Saveds::select('post_id')->where('user_id', Auth::user()->id)->get();

            $savedArr = array_flatten($saveds->toArray()); // end like

            $posts = Post::where('user_id', $profile_id->id)->get();

            $viewspostId = PostsViews::where('user_id', $profile_id->id)->pluck('id_post')->toArray();  // following

            $viewsposts = Post::whereIn('id', $viewspostId)->get();

            $CheckFriend = Friends::where(['user' => Auth::id(), 'friend' => $profile_id->id])->first();

            return view('home.page-profile', compact('profile_id', 'savedArr', 'followings', 'viewsposts', 'followers', 'likeArr', 'newusers', 'CheckFriend', 'posts'));
        } else {

            return redirect('/')->with('delete', '  المستخد غير موجود ');
        }
    }
    // show post in page
    public function postpage($id, $dis)
    {
        $post = Postpage::find($id);
        if ($post) {
            if ($post) {

                $view =  PostsViews::where(['user_id' => Auth::id(), 'id_post_page' => $post->id])->first();

                if (!$view) {

                    PostsViews::createViewpostpage($post);
                }
                $likeAuth = Like::where(['user_id' => Auth::id(), 'post_page_id' => $post->id])->first();  // posts
                $postpage = Postpage::where('page_id', $post->page_id)->inRandomOrder()->limit(1)->first();
                $posts = Post::where('user_id', $post->pagename->admin)->get();
                return view('home.forum-post-page-view', compact('post', 'likeAuth', 'posts', 'postpage'));
            }
        }
    }

    public function showservies($id, $name_services)
    {
        if (Auth::check()) {
            $servies = services::find($id);
            if ($servies) {
                $view =  PostsViews::where(['user_id' => Auth::id(), 'id_service' => $servies->id])->first();

                if (!$view) {

                    PostsViews::createViewservies($servies);
                }
                $serviesRoundmAll = Services::inRandomOrder()->limit(5)->get();
                $serviesroundm = Services::inRandomOrder()->limit(1)->first();
                $serviesroundm2 = Services::inRandomOrder()->limit(1)->first();

                return view('home.view-serviecs', compact('servies', 'serviesRoundmAll', 'serviesroundm', 'serviesroundm2'));
            } else return redirect('/')->with('delete', 'لا يوجود لدينا اي صفحة بهذا الاسم');

            // $moves = services::orderBy('created_at', 'desc')->paginate(6);
        }
    }
}
