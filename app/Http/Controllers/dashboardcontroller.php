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
use App\Postpage;
use App\Services;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller



{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }



    public function home()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {
            return view('dashboard.home');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }
    public function users()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.users');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }
    public function posts()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.posts');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function pages()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.pages');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }
    public function postpage()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.postpage');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function market()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.market');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }
    public function reports()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.reports');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function city()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.city');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function job()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.job');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function music()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.music');
        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }
    public function sendemail()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('Services.controler');

        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function likes()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.likes');

        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }
    public function comments()
    {
        if (auth()->user()->per == '1' or Auth::user()->per == '2') {

            return view('dashboard.comment');

        } else {
            return redirect('/')->with('delete', ' لا يوجد لدينا رابط بهذا الاسم  ');
        }
    }

    public function accpet(Request $request, $id)
    {

        $services = Services::find($id);

        $services->Status = $request->Status;

        $services->save();

        return back()->with('message', 'تم التعديل');
    }

    public function upEmail(Request $request, $id){


        $user = User::find($id);

        $user->email = $request->email;

        $user->save();

        return back()->with('message', 'تم تحديث الايمال ');

    }
}
