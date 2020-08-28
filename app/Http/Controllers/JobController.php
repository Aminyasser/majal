<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Services;
use App\City;
use App\Job;
use App\Like;
use App\comment;
use App\Reports;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function jobsuser($id){

        $job  = Job::find($id);
        $jobsuser = User::where('job',$id)->get();



        return view('job.jobsuser',compact('jobsuser','job','likesuserauth'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->id =='1') {
            # code...
            $job = new Job();
            $job->job_name = $request->job;
           $job->save();

           return redirect()->back()->with('message', ' Done save');
        }

    }

    public function searchcity(Request $request)
    {


        $validatedData =   $request->validate([

            'q' => 'required'
        ]);

        $q = $request->qc;

        $filterPost = City::where('city_name', 'like', '%' . $q . '%')->get();


        if ($filterPost->count()) {


            return view('pages.search', compact('filterPost'));

        }
        else {

            return redirect('/')->with('delete', 'not found any result');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Job::find($id);
        $jobs->delete();
        return back()->with('delete', 'deleted ');
    }
}
