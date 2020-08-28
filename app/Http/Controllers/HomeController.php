<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Post;
use App\Comment;
use App\Like;
use App\Move;
use App\Musics;
use App\Playlists;
use App\User;
use App\Story;
use App\Postpage;
use App\Services;
use App\Friends;
use App\Pages;
use App\PostsViews;
use App\Saveds;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexchat($id)
    {
        if (Auth::check()) {
            return view('chat.home');
        } else {
            return redirect('/login')->with('delete', 'يرجي تسجيل الدخول');
        }
    }

    public function allmessage()
    {
        if (Auth::check()) {
            return view('chat.allmessage');
        } else {
            return redirect('/login')->with('delete', 'يرجي تسجيل الدخول');
        }
    }
    function jsonResponse()
    {
        if (Auth::check()) {
            $user = DB::table('chats')->get();
            return response()->json($user);
        } else {
            return redirect('/login')->with('delete', 'يرجي تسجيل الدخول');
        }
    }

    //
    public function searchuser(Request $request)
    {


        $validatedData =   $request->validate([

            'q' => 'required'
        ]);

        $q = $request->q;

        $filterPost = User::where('name', 'like', '%' . $q . '%')->orwhere('city', 'like', '%' . $q . '%')->get();


        if ($filterPost->count()) {
            $posts = Post::all();

            return view('pages.search', compact('filterPost', 'posts'));
        } else {

            return redirect('/')->with('delete', 'not found any result');
        }
    }

    //
    public function index(Post $post)
    {

        $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // posts

        $posts = Post::whereIn('user_id', $friendsId)->orwhere('user_id', Auth::id())->limit(10)->get();    // end posts

        $users = User::whereNotIn('id', $friendsId)->inRandomOrder()->limit(3)->get(); // users

        $myposts = Post::orderby('created_at', 'desc')->where('user_id', Auth::id())->limit(3)->get(); // my posts

        $likesgive = Like::where(['user_id' => Auth::id(), 'like' => '1'])->get(); // like user Auth

        $likes = Like::select('post_id')->where('user_id', Auth::user()->id)->get();

        $likeArr = array_flatten($likes->toArray()); // end like

        // saved

        $savedsgive = Saveds::where(['user_id' => Auth::id()])->get(); // like user Auth

        $saveds = Saveds::select('post_id')->where('user_id', Auth::user()->id)->get();

        $savedArr = array_flatten($saveds->toArray()); // end like

        // end saved

        //my saveds
        $savedId = Saveds::where('user_id', Auth::id())->pluck('post_id')->toArray();  // posts

        $saveds = Post::whereIn('id', $savedId)->inRandomOrder()->limit(5)->get();    // end posts

        $storys = Story::orderBy('created_at', 'desc')->get();


        $friends = Friends::where('user', Auth::id())->first();

        $pages = Pages::inRandomOrder()->limit(1)->get();
        // $users = User::paginate(6)->except(['id', Auth()->user()->id]);
        // return $users;
        $services = Services::orderBy('created_at', 'desc')->where('Status', 'D')->inRandomOrder()->limit(5)->get();

        $My_Page = Pages::where('admin', Auth::id())->first();

        $postspage = Postpage::orderBy('created_at', 'desc')->inRandomOrder()->limit(5)->get();

        $lastviewid = PostsViews::where('user_id', Auth::id())->pluck('id_post')->toArray();  // posts

        $postsviews = Post::whereIn('id', $lastviewid)->inRandomOrder()->limit(5)->get();

        $music = Musics::orderBy('created_at', 'desc')->paginate(6);

        $playlists = Playlists::where('user_id', Auth::id())->get();


        return view('home.home', compact('posts', 'myposts', 'storys', 'likeArr', 'services', 'My_Page', 'savedArr', 'postsviews', 'pages', 'saveds', 'users', 'my_friends', 'friends', 'postspage'));
    }

    public function profiles()
    {


        if (Auth::check()) {
            $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // posts

            $users = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();


            return view('home.profiles', compact('users', 'friendsId'));
        } else {
            return redirect('/')->with('message', 'قم بتسجيل الدخول ثانيا');
        }
    }
    //
    public function chats()
    {
        return view('pages.chats');
    }
}
