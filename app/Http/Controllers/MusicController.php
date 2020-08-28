<?php

namespace App\Http\Controllers;

use App\Musics;
use App\Playlists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    //
    public function create()
    {
        return view('move.createmusic');
    }
    // save

    public function store(Request $request)
    {

        if ($request->hasFile('music')) {
            $file = $request->file('music');
            $exs = $file->getclientoriginalextension();
            $filename = 'music' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/musics/', $filename);
        } else {
            # code...
            $filename = null;
        }

        $music = new Musics();
        $music->name = $request->musicname;
        $music->user_id = Auth()->user()->id;
        $music->music = $filename;

        $music->save();


        return back()->with('message', ' تم رفع الاغنية ');
    }


//
    public function show($id,$name)
    {
        $musics = Musics::find($id);
        if($musics){

            $userpalylist = Playlists::where(['user_id'=> Auth::id() , 'music_id' => $id])->first();

            return view('pages.showmusic', compact('musics','userpalylist'));
        }
        else {
            return redirect('/');
        }
    }

    public function listen() {
        $musics = Musics::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.music',compact('musics'));
    }
    // search
    public function searchmusic(Request $request)
    {
        $validatedData =   $request->validate([

            'qm' => 'required'
        ]);

        $qm = $request->qm;

        $filtermusic = Musics::where('name', 'like', '%' . $qm . '%')->get();


        if ($filtermusic->count()) {


            return view('Services.searchmusic', compact('filtermusic'));
        } else {

            return redirect('/')->with('delete', '  عفوا لا توجد نتيجة يرجي التاكد من الاسم ');
        }
    }

    public function destroy($id)
    {
        $Dmusic = Musics::find($id);
         Playlists::where('music_id', $Dmusic->id)->delete();
        $Dmusic->delete();

        return back()->with('delete', 'تم المسح ');
    }
}
