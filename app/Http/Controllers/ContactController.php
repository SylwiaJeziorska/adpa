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
            'subject'=>$request->subject

        );
        Mail::send('emails.contact', $data, function($message)use ($data){
            $message->from('mailjet@comite-adpa.fr');
            $message->to('comite-entreprise@adpa38.fr');
            $message->replyTo($data['email']);
            $message->subject('[www.comite-adpa.fr] '.$data['subject']);

        });
        return redirect()->back()->with('message', 'Merci pour le message! Nous reviendrons vers vous bientôt!');
    }

}
