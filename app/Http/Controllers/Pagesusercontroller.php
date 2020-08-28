<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Like;
use App\Move;
use App\City;
use App\Pages;

use App\Musics;
use App\User;
use App\Friends;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Intervention\Image\Facades\Image;
use App\Postpage;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Pagesusercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }

    public function home()
    {

        $city = City::all();
        $mypage = Pages::where('admin', Auth::id())->get();

        $postspage = Postpage::orderBy('created_at', 'desc')->get();

        return view('pagesuser.homepage', compact('city', 'mypage', 'postspage'));
    }
    public function pages()
    {

        $pages = Pages::all();
        $likeId = Like::where('user_id', Auth::id())->pluck('page_id')->toArray();
        return view('home.pages', compact('pages', 'likeId'));
    }
    //
    public function getonepage($id, $name_page, $serves)
    {
        $page = Pages::find($id);

        if ($page) {
            $page = Pages::find($id);

            $likes = Like::where(['page_id' => $id, 'user_id' => Auth::id()])->get();

            $pages = Pages::where('id', '!=', $page->id)->inRandomOrder()->limit(5)->get();

            if ($page) {

                $postspages = Postpage::where('page_id', $page->id)->orderBy('created_at', 'desc')->get();

                $mylike = Like::where(['user_id' => Auth::id(), 'page_id' => $page->id])->first();  // posts

                $likeId = Like::where('user_id', Auth::id())->pluck('page_id')->toArray();  // posts

                $likepostpage = Like::where('user_id', Auth::id())->pluck('post_page_id')->toArray();  // posts

                $likes = Like::where('page_id', $page->id)->pluck('user_id')->toArray();

                $users = User::whereIn('id', $likes)->get();

                return view('home.page-user-view', compact('page', 'postspages', 'pages', 'likeId', 'users', 'mylike', 'likepostpage'));
            } else {
                return redirect('/AllPages')->with('success', 'لا يوجد صفحة بهذا الاسم يمكنك البحث هنا عن صفحة الذي تريدها');
            }
        } else {
            return redirect('/')->with('success', 'لا يوجد صفحة بهذا الاسم');
        }
    }
    public function createpage(Request $request)
    {


        // pic
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $exs = $file->getclientoriginalextension();
            $pic = 'pic' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/pages/', $pic);
        } else {
            # code...
            $pic = null;
        }
        // pic
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $exs = $file->getclientoriginalextension();
            $cover = 'cover' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/pages/', $cover);
        } else {
            # code...
            $cover = null;
        }
        $page = new Pages();
        $page->namepage =  $request->namepage;
        $page->about =  $request->about;
        $page->phone =  $request->phone;
        $page->place =  $request->place;
        $page->servis =  $request->servis;
        $page->cover =  $cover;
        $page->admin =  Auth::id();
        $page->pic =  $pic;
        $page->save();
        // return $page;
        return back()->with('success', 'تم انشاء الصفحة');
    }

    public function editpage($id, $name_page)
    {

        $IdPage = pages::find($id);
        if ($IdPage) {

            $city = City::all();

            return view('edits.editpage', compact('IdPage', 'city'));
        } else {
            return redirect('/')->with('success', 'لا يوجد رابط بهذا الاسم');
        }
    }

    public function updatepage(Request $request, $id)
    {

        $page = pages::find($id);
        if ($page) {
            if ($request->hasFile('pic')) {
                $file = $request->file('pic');
                $exs = $file->getclientoriginalextension();
                $pic = 'pic_page' . '_' . time() . '.' . $exs;
                $file->move(public_path() . '/pages/', $pic);
                // unlink(public_path().'/coverimage/'.$post->image);
                $page->pic = $pic;
            }
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $exs = $file->getclientoriginalextension();
                $cover = 'cover_page' . '_' . time() . '.' . $exs;
                $file->move(public_path() . '/pages/', $cover);
                // unlink(public_path().'/coverimage/'.$post->image);
                $page->cover = $cover;
            }

            $page->namepage =  $request->namepage;
            $page->about =  $request->about;
            $page->phone =  $request->phone;
            $page->place =  $request->place;
            $page->servis =  $request->servis;
            $page->admin =  Auth::id();
            $page->save();
            return redirect('/AllPages')->with('success', 'تم تعديل الصفحة');
        }
    }
    public function deletepage($id)
    {

        $page = pages::find($id);


        if (Auth::user()->id == $page->admin or auth()->user()->per == '1') {



            $postspage = Postpage::where(['page_id' => $page->id])->delete();
            $likespage = Like::where(['page_id' => $page->id])->delete();


            pages::where('id', $id)->delete();
            if (auth()->user()->per = '1') {

                return redirect('/dashboard/pages')->with('delete', '  تم مسح الصفحة');
            } else {
                return redirect('/homepage')->with('delete', ' تم مسح الصفحة');
            }
        }
    }
    //
    public function searchpage(Request $request)
    {
        $validatedData =   $request->validate([

            'qpage' => 'required'
        ]);

        $qpage = $request->qpage;

        $filterpage = pages::where('namepage', 'like', '%' . $qpage . '%')->get();


        if ($filterpage->count()) {


            return view('pagesuser.pagesearch', compact('filterpage'));
        } else {

            return redirect('/')->with('delete', '  عفوا لا توجد نتيجة يرجي التاكد من الاسم ');
        }
    }
}
