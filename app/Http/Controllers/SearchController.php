<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $search = $request->get('term');

        $result = User::where('name', 'LIKE', '%' . $search . '%')->get();

        return response()->json($result);
    }

    public function searchuser(Request $request)
    {

        $validatedData =   $request->validate([

            'search' => 'required'
        ]);

        $q = $request->search;

        $filterusers = User::where('name', 'like', '%' . $q . '%')->where('id', '!=', Auth::id())->inRandomOrder()->paginate(10);

        $filterpost = Post::where('body', 'like', '%' . $q . '%')->inRandomOrder()->limit(5)->get();

        if ($filterusers->count()) {

            $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // posts

            $viewsId = PostsViews::where('user_id', Auth::id())->pluck('profile_id')->toArray();  // posts


            return view('home.searchprofiles', compact('filterusers', 'friendsId', 'viewsId', 'filterpost'));
        } else {

            return back()->with('delete', 'not found any result');
        }
    }


}
