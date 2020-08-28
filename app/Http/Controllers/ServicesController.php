<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Services;
use App\City;
use App\Like;
use App\Job;
use App\Reports;
use App\comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'tbmove']);
    }

    public function tbmove()
    {
        $services = services::orderBy('created_at', 'desc')->paginate(6);

        $count = services::count();

        $comments = Comment::count();
        $blogs = post::count();
        $users = User::count();
        $citys = City::count();
        $jobs = Job::count();
        $allreports = Reports::count();

        return view('Services.tblServices', compact('services', 'count', 'allreports', 'comments', 'blogs', 'users', 'citys', 'jobs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys = City::all();
        $services = Services::orderby('created_at', 'desc')->where('Status', 'D')->get();
        return view('home.markets', compact('services', 'citys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // pic
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $exs = $file->getclientoriginalextension();
            $pic = 'pic' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic);
        } else {
            # code...
            $pic = null;
        }
        // pic 1
        if ($request->hasFile('pic1')) {
            $file = $request->file('pic1');
            $exs = $file->getclientoriginalextension();
            $pic1 = 'pic' . '_1' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic1);
        } else {
            # code...
            $pic1 = null;
        }
        // pic 2
        if ($request->hasFile('pic2')) {
            $file = $request->file('pic2');
            $exs = $file->getclientoriginalextension();
            $pic2 = 'pic' . '_2' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic2);
        } else {
            # code...
            $pic2 = null;
        }
        // pic 3
        if ($request->hasFile('pic3')) {
            $file = $request->file('pic3');
            $exs = $file->getclientoriginalextension();
            $pic3 = 'pic' . '_3' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic3);
        } else {
            # code...
            $pic3 = null;
        }

        $servis = new services();
        $servis->name_services = $request->name_services;
        $servis->phone = $request->phone;
        $servis->dis_services = $request->dis_services;
        $servis->price = $request->price;
        $servis->place = $request->place;
        $servis->user_id = Auth()->user()->id;
        $servis->pic = $pic;
        $servis->pic1 = $pic1;
        $servis->pic2 = $pic2;
        $servis->pic3 = $pic3;


        $servis->save();

        // return $servis;


        return back()->with('success', 'تم رفع المنتج وجاري مراجعته من  الادارة');
    }



    public function edit($id, $name_services)

    {

        $Servies = services::find($id);
        if (Auth::user()->id == $Servies->user_id or auth()->user()->per == '1' or auth()->user()->per == '2') {
            $citys = City::all();

            return view('edits.editservies', compact('Servies', 'citys'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servis = services::find($id);
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $exs = $file->getclientoriginalextension();
            $pic = 'pic' . '_' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic);
            if ($servis->pic) {
                unlink(public_path() . '/pics/' . $servis->pic);
            }
            $servis->pic = $pic;
        } else {
            $servis->pic = '';
        }
        //
        if ($request->hasFile('pic1')) {
            $file = $request->file('pic1');
            $exs = $file->getclientoriginalextension();
            $pic1 = 'pic' . '_1' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic1);
            if ($servis->pic1) {
                unlink(public_path() . '/pics/' . $servis->pic1);
            }
            $servis->pic1 = $pic1;
        }
        //
        if ($request->hasFile('pic2')) {
            $file = $request->file('pic2');
            $exs = $file->getclientoriginalextension();
            $pic2 = 'pic' . '_2' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic2);
            if ($servis->pic2) {
                unlink(public_path() . '/pics/' . $servis->pic2);
            }
            $servis->pic2 = $pic2;
        }
        //
        if ($request->hasFile('pic3')) {
            $file = $request->file('pic3');
            $exs = $file->getclientoriginalextension();
            $pic3 = 'pic' . '_3' . time() . '.' . $exs;
            $file->move(public_path() . '/pics/', $pic3);
            if ($servis->pic3) {
                unlink(public_path() . '/pics/' . $servis->pic3);
            }
            $servis->pic3 = $pic3;
        }

        $servis->name_services = $request->name_services;
        $servis->phone = $request->phone;
        $servis->dis_services = $request->dis_services;
        $servis->price = $request->price;
        $servis->place = $request->place;

        if (auth()->user()->per == '1') {

            $servis->Status = $request->Status;
        }

        // return $servis;
        $servis->save();

        return  redirect('/MarketPlace')->with('success', 'تم التحديث');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Dservices = services::find($id);
        if ($Dservices->pic) {

            unlink(public_path() . '/pics/' . $Dservices->pic);
        }
        if ($Dservices->pic1) {

            unlink(public_path() . '/pics/' . $Dservices->pic1);
        }
        if ($Dservices->pic2) {

            unlink(public_path() . '/pics/' . $Dservices->pic2);
        }
        if ($Dservices->pic3) {

            unlink(public_path() . '/pics/' . $Dservices->pic3);
        }

        $Dservices = services::find($id)->delete();

        return back()->with('delete', 'تم المسح ');
    }
}
