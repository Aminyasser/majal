<?php

namespace App\Http\Controllers;

use App\Postpage;
use App\like;
use Illuminate\Http\Request;
use App\comment;
use App\Saveds;
use App\PostsViews;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class postspageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'about']);
    }

    // new post in page
    public function nawpostpage(Request $request)
    {

        // pic
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $exs = $file->getclientoriginalextension();
            $pic = 'pic' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/postpages/', $pic);
        } else {
            # code...
            $pic = null;
        }
        // pic2
        if ($request->hasFile('pic2')) {
            $file = $request->file('pic2');
            $exs = $file->getclientoriginalextension();
            $pic2 = 'pic2' . '_2' . time() . '.' . $exs;
            $file->move(public_path() . '/postpages/', $pic2);
        } else {
            # code...
            $pic2 = null;
        }
        // pic3
        if ($request->hasFile('pic3')) {
            $file = $request->file('pic3');
            $exs = $file->getclientoriginalextension();
            $pic3 = 'pic3' . '_3' . time() . '.' . $exs;
            $file->move(public_path() . '/postpages/', $pic3);
        } else {
            # code...
            $pic3 = null;
        }
        // pic4
        if ($request->hasFile('pic4')) {
            $file = $request->file('pic4');
            $exs = $file->getclientoriginalextension();
            $pic4 = 'pic4' . '_4' . time() . '.' . $exs;
            $file->move(public_path() . '/postpages/', $pic4);
        } else {
            # code...
            $pic4 = null;
        }
        // video
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $exs = $file->getclientoriginalextension();
            $video = 'video' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/postpages/', $video);
        } else {
            # code...
            $video = null;
        }
        $poatpage = new Postpage();

        $poatpage->dis =  $request->dis;
        $poatpage->page_id =  $request->page_id;
        $poatpage->pic =  $pic;
        $poatpage->pic2 =  $pic2;
        $poatpage->pic3 =  $pic3;
        $poatpage->pic4 =  $pic4;
        $poatpage->video =  $video;
        $poatpage->save();
        //
        return back()->with('message', 'تم انشاء المنشور ');
    }


    // edit post in page

    public function editpostpage($id, $dis)
    {

        $post = Postpage::find($id);

        return view('edits.editpostpage', compact('post'));
    }

    // update post in page

    public function updatepostpage(Request $request, $id)
    {
        $post = postpage::find($id);
        if ($post) {
            if ($request->hasFile('pic')) {
                $file = $request->file('pic');
                $exs = $file->getclientoriginalextension();
                $pic = 'pic' . '_' . time() . '.' . $exs;
                $file->move(public_path() . '/postpages/', $pic);
                // unlink(public_path().'/coverimage/'.$post->image);
                $post->pic = $pic;
            }
            else{
                $post->pic = '';
            }
            if ($request->hasFile('pic2')) {
                $file = $request->file('pic2');
                $exs = $file->getclientoriginalextension();
                $pic2 = 'pic2' . '_2' . time() . '.' . $exs;
                $file->move(public_path() . '/postpages/', $pic2);
                // unlink(public_path().'/coverimage/'.$post->image);
                $post->pic2 = $pic2;
            }
            else{
                $post->pic2 = '';

            }
            //
            if ($request->hasFile('pic3')) {
                $file = $request->file('pic3');
                $exs = $file->getclientoriginalextension();
                $pic3 = 'pic3' . '_3' . time() . '.' . $exs;
                $file->move(public_path() . '/postpages/', $pic3);
                // unlink(public_path().'/coverimage/'.$post->image);
                $post->pic3 = $pic3;
            }
            else{
                $post->pic3 = '';

            }
            //
            if ($request->hasFile('pic4')) {
                $file = $request->file('pic4');
                $exs = $file->getclientoriginalextension();
                $pic4 = 'pic4' . '_4' . time() . '.' . $exs;
                $file->move(public_path() . '/postpages/', $pic4);
                // unlink(public_path().'/coverimage/'.$post->image);
                $post->pic4 = $pic4;
            }
            else{
                $post->pic4='';
            }
            //
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $exs = $file->getclientoriginalextension();
                $video = 'video' . '_' . time() . '.' . $exs;
                $file->move(public_path() . '/postpages/', $video);
                // unlink(public_path().'/coverimage/'.$post->image);
                $post->video = $video;
            }
            $post->dis =  $request->dis;
            $post->save();
            return redirect()->back()->with('success', 'تم تعديل ');
        }
    }

    // delete post page

    public function destroy($id)
    {
        $post = Postpage::find($id);


        if (Auth::user()->id == $post->user_id or auth()->user()->per == '1') {


            $postlike = DB::table('likes')->where(['post_id' => $post->id])->delete();


            $postcomment = comment::where(['post_id' => $post->id])->delete();

            $postsaved = Saveds::where(['post_id' => $post->id])->delete();



            Postpage::where('id', $id)->delete();

            return redirect('/AllPages')->with('success', '  تم المسح المنشور');
        }
    }
}
