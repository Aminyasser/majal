<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailerStarted;
use App\Mail\UsersSup;
use App\User;

use App\Mail\MailerShip;

class MailController extends Controller
{

    public function start(Request $request)
    {

        Mail::to($request->user())->send(new MailerStarted);
    }

    //

    public function ship(Request $request)
    {
        Mail::to($request->user())->send(new MailerShip($request->user()->name, $request->user()->password));

        return redirect()->back()->with('message', ' تم ارسال الايمال   ');
    }

    //

    public function complete(Request $request)
    {
        $mails = User::where('email', $request->input('email'))->get();
        foreach ($mails as $mail) {
        }
        $useremail =  $mail->email;

        Mail::to($useremail)->send(new UsersSup($request->title, $request->pragra));

        return back()->with('message', ' تم ارسال الايمال   ');
    }
}
