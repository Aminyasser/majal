<?php

namespace App\Providers;

use App\Chat;
use App\City;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Like;
use App\Pages;
use App\comment;
use App\Job;
use App\Musics;
use App\Services;
use App\Friends;
use App\Notifications;
use App\Postpage;
use App\User;
use App\Post;
use App\Playlists;
use App\Reports;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->share('myname', 'amin');

        view()->composer('*', function ($view) {

            // $posts = Like::all();

            $view->with('likes', Like::all());
        });

        view()->composer('*', function ($view) {

            // $posts = Like::all();
            $follows =  Friends::where('friend', Auth::id())->get();
            $pageAuth = Pages::where('Admin', Auth::id())->first();

            $view->with('followme', $follows);
            $view->with('pageAuth', $pageAuth);
        });

        // -------------- dashbord -------------------- //

        // users
        view()->composer('*', function ($view) {
            $AdminUsers =  User::all();

            $view->with('AdminUsers', $AdminUsers);
        });

        // posts
        view()->composer('*', function ($view) {
            $AdminPosts =  Post::all();

            $view->with('AdminPosts', $AdminPosts);
        });

        // pages
        view()->composer('*', function ($view) {
            $AdminPages =  Pages::all();

            $view->with('AdminPages', $AdminPages);
        });

        // posts pages
        view()->composer('*', function ($view) {
            $AdminPostsPages =  Postpage::all();

            $view->with('AdminPostsPages', $AdminPostsPages);
        });

        // services
        view()->composer('*', function ($view) {
            $AdminServices =  Services::all();

            $view->with('AdminServices', $AdminServices);
        });

        // Report
        view()->composer('*', function ($view) {
            $AdminReports =  Reports::all();

            $view->with('AdminReports', $AdminReports);
        });

        // city
        view()->composer('*', function ($view) {
            $AdminCity =  City::all();

            $view->with('AdminCity', $AdminCity);
        });

        // job
        view()->composer('*', function ($view) {
            $Adminjob =  Job::all();

            $view->with('Adminjob', $Adminjob);
        });

        // music
        view()->composer('*', function ($view) {
            $Adminmusic =  Musics::all();

            $view->with('Adminmusic', $Adminmusic);
        });

        view()->composer('*', function ($view) {
            $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // posts

            $userchat = User::whereIn('id', $friendsId)->inRandomOrder()->get(); // users

            $view->with('userchat', $userchat);
        });


        // comment
        view()->composer('*', function ($view) {
            $AdminComment =  comment::all();

            $view->with('AdminComment', $AdminComment);
        });

        // likes
        view()->composer('*', function ($view) {
            $AdminLikes =  Like::all();

            $view->with('AdminLikes', $AdminLikes);
        });

        // follow
        view()->composer('*', function ($view) {

            $follow =  Friends::where('user', Auth::id())->get();

            $view->with('follow', $follow);
        });

        // playlist
        view()->composer('*', function ($view) {

            $playlist =  Playlists::where('user_id', Auth::id())->get();

            $view->with('playlist', $playlist);
        });

        // following
        view()->composer('*', function ($view) {

            $following = Friends::where('user', Auth::id())->get();

            $view->with('following', $following);
        });

        // followers
        view()->composer('*', function ($view) {

            $followes = Friends::where('friend', Auth::id())->get();

            $view->with('followes', $followes);
        });

        view()->composer('*', function ($view) {
            if (Auth::check()) {

                $chats = Chat::where(['recever'=>Auth::id(),'is_seen'=>'1'])->limit(10)->get();

                $view->with('chats', $chats);
            }
        });

        view()->composer('*', function ($view) {
            if (Auth::check()) {

                $user = Auth::user();

                $notfiy =  $user->unreadnotifications;

                $view->with('notfiy', $notfiy);
            }
        });
    }
}
