<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use Illuminate\Support\Facades\Auth;
class StoryController extends Controller
{
    //
    public function addstory(Request $request){
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $exs = $file->getclientoriginalextension();
            $filename =  auth()->user()->name . time() . '.' . $exs;
            $file->move(public_path() . '/storys/', $filename);
        } else {
            # code...
            $filename = null;
        }
        $newstory = new Story();
        $newstory->story = $request->story;
        $newstory->pic = $filename;
        $newstory->user_id = Auth::id();

         $newstory->save();


         return redirect()->back()->with('message', ' تم اضافة  بنجاح ');


    }
}
