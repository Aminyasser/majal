<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Services;
use App\City;
use App\Job;
use App\Like;
use App\Reports;
use App\Role;
use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //  return view('city.create');
    // }
// cityuser
    public function cityuser($id){


//
        $city  = City::find($id);

        $cityuser = User::where('city',$id)->get();

        return view('city.usercitys',compact('cityuser','city','likesuserauth'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if (Auth::user()->id =='1') {
            # code...
            $city = new City();
            $city->city_name = $request->city;
           $city->save();

            return redirect('/dashboard/city')->with('message', ' Done save');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $citys = City::find($id);
        $citys->delete();
        return back()->with('delete', 'deleted ');
    }
}
