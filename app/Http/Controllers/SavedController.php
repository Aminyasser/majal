<?php

namespace App\Http\Controllers;

use App\Saved as AppSaved;
use Illuminate\Http\Request;
use App\Saveds;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    //

    public function saved(Request $request , $id){

        $newsaved = new Saveds();

        $newsaved->post_id = $id;
        $newsaved->user_id = Auth::id();

         $newsaved->save();

         return redirect()->back();
    }


    public function deletesaved($id){

        $deletesaved = Saveds::find($id);


         $deletesaved->delete();

         return redirect()->back();
    }
}
