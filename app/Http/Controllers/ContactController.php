<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\ContactFormRequest;
use App\Notifications\InboxMessage;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

//    public function mailToAdmin(ContactFormRequest $message, Admin $admin)
//    {        //send the admin an notification
//
//        $admin->notify(new InboxMessage($message));
//        // redirect the user back
//        return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
//    }
    public function mailToAdmin(Request $request)
    {
        $this->validate($request,[
        'name' => 'required|max: 255',
        'email' => 'required|email|max: 255',
        'message' => 'required',
    ]);
        $data =array(
            'email'=> $request->email,
            'name'=>$request->name,
            'contactMessage'=> $request->message,
            'subject'=>$request->object

        );

        Mail::send('emails.contact', $data, function($message)use ($data){
            $message->from($data['email']);
            $message->to('sylwiajeziorska@gmail.com');
            $message->subject($data['contactMessage']);


        });
        return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
    }

}
