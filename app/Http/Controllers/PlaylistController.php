<?php

namespace App\Http\Controllers;
use App\Playlists;
use App\Musics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    //

    public function storepaly(Request $request){

        $newplay = new Playlists();


        $newplay->music_id = $request->music_id;
        $newplay->user_id = Auth::id();

         $newplay->save();
        // return $newplay;

         return redirect()->back();


    }
}
