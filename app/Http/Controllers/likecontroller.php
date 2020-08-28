<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\User;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class likecontroller extends Controller
{
    //
    public function givelike(Request $request,$id)
    {

        $like = new Like();

        $like->like = '1';
        $like->user_id = auth()->user()->id;
        $like->post_id = $id;
        $like->page_id = $request->page_id;
        $like->post_page_id = $request->post_page_id;

        $like->save();
        // dd($like);

        return redirect()->back()->with('message', ' تم الاعجاب  ');
    }
    //

    //


    public function deletelike($id)
    {

        // return Like::find($id);
        Like::where('id', $id)->delete();


        return  redirect()->back()->with('delete', 'تم مسح الاعجاب ');
    }
}
