<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Services;
use App\City;
use App\Saveds;
use App\Job;
use App\Friends;
use App\Reports;
use App\Like;
use App\comment;
use App\Notifications\PostNewNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\PostsViews;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'coverimage' => 'sometimes|max:9999999999999',
            'video' => 'sometimes|max:9999999999999',
        ], [
            'body.required' => 'لا يوجد وصف',
        ]);


        if ($request->hasFile('coverimage')) {
            $file = $request->file('coverimage');
            $exs = $file->getclientoriginalextension();
            $filename = 'cover_image' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/coverimage/', $filename);
        } else {
            # code...
            $filename = null;
        }
        //
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $exs = $file->getclientoriginalextension();
            $videoname = 'video' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/videos/', $videoname);
        } else {
            # code...
            $videoname = null;
        }


        $post = new Post();

        $post->body = $request->body;
        $post->image = $filename;
        $post->video = $videoname;
        $post->user_id = auth()->user()->id;
        $post->user_name = auth()->user()->name;
        $friendsId = Friends::where('user', Auth::id())->pluck('friend')->toArray();  // posts
        $user = User::whereIn('id', $friendsId)->where('id', '!=', Auth::id())->get(); // users
        $post->save();
        // Notification::send($user, new PostNewNotification($post));
        return redirect('/')->with('message', ' تم اضافة المنشور بنجاح ');
    }

    // edit post
    public function edit($id)
    {


        $post = Post::find($id);

        if (Auth::user()->id == $post->user_id or auth()->user()->per == '1' or auth()->user()->per == '2') {

            $post = Post::find($id);

            return view('edits.editpost', compact('post', 'likesuserauth'));
        } else {
            return redirect('/')->with('massage', 'هذا المنشور غير موجود');
        }
    }
    // update post
    public function update(Request $request,  $id)
    {


        $post = Post::find($id);

        if ($request->hasFile('coverimage')) {
            $file = $request->file('coverimage');
            $exs = $file->getclientoriginalextension();
            $filename = 'cover_image' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/coverimage/', $filename);
            if ($post->image) {

                unlink(public_path() . '/coverimage/' . $post->image);
            }
            $post->image = $filename;
        } else {

            $post->image = '';
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $exs = $file->getclientoriginalextension();
            $videoname = 'video' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/videos/', $videoname);
            if ($post->video) {

                unlink(public_path() . '/videos/' . $post->video);
            }
            $post->video = $videoname;
        } else {
            $post->video = '';
        }

        $post->body = $request->body;
        $post->comentMode = $request->comentMode;

        $post->save();

        return redirect('/posts/' . $post->id . '/' . $post->body)->with('success', ' تم التعديل');
    }

    // delete post

    public function destroy($id)
    {
        $post = Post::find($id);


        if (Auth::user()->id == $post->user_id or auth()->user()->per == '1') {


            $postlike = Like::where(['post_id' => $post->id])->delete();

            $postcomment = comment::where(['post_id' => $post->id])->delete();

            $postsaved = Saveds::where(['post_id' => $post->id])->delete();

            $postsaved = PostsViews::where(['id_post' => $post->id])->delete();

            Post::where('id', $id)->delete();


            return redirect('/')->with('success', '  تم المسح ');
        }
    }
}
