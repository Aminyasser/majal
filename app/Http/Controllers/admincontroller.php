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
use App\comment;
use App\Musics;
use App\Pages;
use App\Services;
use App\Notifications\followNewNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller



{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function storefreind($id)
    {

        # code...
        $Freind = new Friends();

        $Freind->friend = $id;
        $Freind->user = Auth::id();
        $Freind->save();
        $user = User::find($id);
        Notification::send($user, new followNewNotification($Freind));
        return  back()->with('message', ' تم المتابعة');
    }
    // delete friend

    public function destroy($id)
    {
        $Friend = Friends::find($id);
        $Friend->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
        return back()->with('delete', 'تم الغاء المتابعة ');

    }

    public function destroyF($id)
    {
        $Friend = Friends::find($id);
        $Friend->delete();
        return back()->with('delete', 'تم الغاء المتابعة ');


    }
    // tolal user admin



    public function control(Request $request)
    {
        // $move = new Move();
        // $move->name = $request->MoveName;
        // $move->link = $request->link;
        // $move->user_id = Auth()->user()->id;
        // $move->image = $filename;
        // $move->save();


        return view('admin.control');
    }
}
