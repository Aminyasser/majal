<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Post;
use App\User;
use App\Services;
use App\City;
use App\Job;
use App\Reports;
use App\Like;
use App\Role;
use App\comment;
use App\Friends;
use App\Pages;
use App\Postpage;
use App\Roles;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    // show user
    //
    // edit user
    public function edit($id)
    {
        $use = User::find($id);

        if ($use) {

            if (Auth::user()->id == $use->id or auth()->user()->per == '1') {
                $user = User::find($id);
                $cites = City::all();
                $jobs = Job::all();
                $roles = Role::all();
                return view('edits.profile-account-setting', compact('user', 'posts', 'cites', 'jobs', 'roles', 'likesuserauth'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/')->with('message', 'لا يوجد لدينا حساب بهذا الاسم');
        }
    }
    // update user
    public function update(Request $request,  $id)
    {

        $user = User::find($id);

        $this->validate($request, [
            'newpassword' => 'sometimes',
            'oldpassword' => 'required',
            'email' => 'unique:users,email,' . $id,
            'user_name' => 'unique:users,user_name,' . $id,

        ], [
            'oldpassword.required' => 'يرجي ادخال كلمة المرور'
        ]);
        $current_password = $user->password;

        if (Hash::check($request['oldpassword'], $current_password)) {

            $user->email = $request->email;
            $user->user_name = $request->user_name;

            if ($request->newpassword) {
                # code...
                $user->password = Hash::make($request->newpassword);
            }

            $user->save();

            if (Auth::user()->per == 1) {
                return redirect('/dashboard/users')->with('success', ' تم تحديث معلومات' . auth()->user()->name);
                # code...
            } else {
                return redirect('/profile/' . Auth::user()->name)->with('success', ' تم التحديث ' . $request->name);
            }
        } else {
            return back()->with('sorry', ' تاكد من كلمة المرور  ' . $request->name);
        }
    }

    // update user
    public function updateinfo(Request $request,  $id)
    {

        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|min:10',
            'about' => 'required|min:4',
            'date' => 'required',
        ],[
            'name.required' => 'يجب ان لا يقل عن 10 حروف',
            'about.required' => 'يجب ان لا يقل عن 5 حروف',
        ]);
        $user->name = $request->name;
        $user->about = $request->about;
        $user->date = $request->date;
        $user->city = $request->city;
        $user->job = $request->job;
        $user->inst = $request->inst;

        $user->save();

        if (Auth::user()->per == 1) {
            return redirect('/dashboard/users')->with('success', ' تم تحديث معلومات' . auth()->user()->name);
            # code...
        } else {
            return redirect('/profile/' . Auth::user()->name)->with('success', ' تم التحديث ' . $request->name);
        }
    }
    // user cover
    public function covedit($id)
    {

        $user = User::find($id);
        return view('admin.edit_img', compact('user', 'likesuserauth'));
    }

    public function update_cover(request $request, $id)
    {

        // cover
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $exs = $file->getclientoriginalextension();
            $filename = 'image-' . $user->name . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/profile/', $filename);
            // unlink(public_path().'/profile/'.$filename->image);
            $user->image = $filename;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $exs = $file->getclientoriginalextension();
            $filename = 'cover-' . $user->name . '-' . time() . '.' . $exs;
            $file->move(public_path() . '/coverpro/', $filename);
            // unlink(public_path().'/coverpro/'.$filename->cover);
            $user->cover = $filename;
        }

        $user->save();
        if (Auth::user()->id == 1) {
            return redirect('/dashboard/users');
            # code...
        } else {
            return back()->with('success', 'تم التغير' . $user->name);
        }
    }


    // delete user

    public function destroy(Request $request, $id)
    {

        $use = User::find($id);
        if (Auth::user()->id == $use->id or auth()->user()->per == '1') {
            $user = User::find($id);
            $current_password = $user->password;
            if (Hash::check($request['oldpassword'], $current_password)) {
            $repots = Reports::where('reportuser', $user->id)->orwhere('reportowner', $user->id)->delete();
            $frind = Friends::where('user', $user->id)->orwhere('friend', $user->id)->delete();
            $commentsuser = comment::where('user_id', $user->id)->delete();
            $likessuser = Like::where('user_id', $user->id)->delete();
            $servisuser = Services::where('user_id', $user->id)->delete();
            $postuser = Post::where('user_id', $user->id)->get();
            foreach ($postuser as $post) {

                $commentpost = comment::where('post_id', $post->id)->delete();
            }
            $postuser = Post::where('user_id', $user->id)->delete();

            $page = Pages::where('admin', $user->id)->get();

            if ($page) {

                foreach ($page as $item)
                    $postpage = Postpage::where('page_id', $item->id)->delete();
                $page = Pages::where('admin', $user->id)->delete();
            }


            $user->delete();
            if (auth()->user()->per == '1') {

                return redirect('/dashboard/users');
            } else {
                return redirect('/')->with('success', 'تم مسح الحساب');
            }
        }
        else{
            return redirect('/users/'.$user->id.'/edit')->with('sorry', 'تاكد من كلمة المرور');

        }
    }
    }

    // report user
    public function reportuser(Request $request)
    {

        $report = new Reports();

        $report->reportuser = $request->reportuser;
        $report->reportowner = $request->reportowner;
        $report->aboutreport = $request->aboutreport;

        $report->save();
        return redirect('/')->with('message', 'تم الابلاغ وسوف  تقوم الادارة بمتابعة الابلاغ');
    }

    public function allreport()
    {
        if (Auth::user()->per == '1' or Auth::user()->per == '2') {
            $allreports = Reports::orderBy('id', 'desc')->paginate(6);
            $comments = Comment::count();
            $blogs = post::count();
            $users = user::all();   // عرض عدد البوستات
            $Services = Services::count();   // عرض عدد البوستات
            $citys = City::count();
            $jobs = Job::count();


            return view('admin.allreport', compact('allreports', 'users', 'comments', 'blogs', 'Services', 'citys', 'jobs'));
        }
    }
}
