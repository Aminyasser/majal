<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Services;
use App\City;
use App\Musics;
use App\Reports;
use App\Job;
use App\comment;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    //

    public function store(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|min:1',
        ]);

        $comment = new comment();
        $comment->post_page_id = $request->post_page_id;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return back()->with('message', ' تم اضافة التعليق');
    }
    //


    public function destroy($id)
    {

        Comment::find($id)->delete();

        return back()->with('delete', ' تم مسح التعليق  ');
    }

    public function editcomment($id)
    {

        $comment = Comment::find($id);
        if (Auth::user()->id == '1' or Auth::user()->id == $comment->user_id) {
            return view('edits.editcomment', compact('comment'));
        } else {
            return redirect()->back();
        }
    }


    // update post
    public function updatecomment(Request $request,  $id)
    {

        $comment = Comment::find($id);

        $comment->body = $request->body;

        $comment->save();
        if (Auth::user()->id == $comment->user_id) {
            return redirect('/')->with('success', ' تم تحديث التعليق');
        } else {
            return view('/');
        }
    }

    public function aj_store(Request $request)
    {
        Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'post_page_id' => $request->post_page_id,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name
        ]);
        return 'ok';
    }
}
