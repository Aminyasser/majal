<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reports;
use App\User;

class ReportsController extends Controller
{
    public function Verify($token){

       user::where('token',$token)->firstOrFail()->update(['token' => null]);

       return redirect('/')->with('message','تم تفعيل حسابك');

    }

    public function getrecoveruser()
    {
        return 'h';
    }
    public function problem()
    {
        return view('Services.problem');
    }
    public function recoveracc(Request $request)
    {
        $report = new Reports();

        $report->emailuser = $request->emailuser;
        $report->account = $request->account;
        $report->answer = $request->answer;
        $report->newpassword = $request->newpassword;
        $report->message = $request->message;

        $report->save();
        return redirect('/')->with('message', '  سوف تتم مراجعة طلبك يرجي الرجوع الي ايمالك ' . $request->account);
    }
    public function update(Request $request, $id)
    {

        $report = Reports::find($id);


        $report->action = $request->action;



        $report->save();

        return back()->with('message', 'تم التعديل');
    }
}
