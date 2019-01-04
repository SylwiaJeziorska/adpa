<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use \Mailjet\Resources;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function newsLetter($id){
        $mailjet = new \Mailjet\Client(('b4407f5d1e52e1ad89c98f8cfc1fdaf3'),('20fd1f38fe1b5cf2a1112a6fbba92a5d'));

        $post = Post::find($id);

        $users = User::whereNotNull('email')->get();
        $userEmail = [];
        foreach ($users as $user) {
            array_push($userEmail, ['Email' => $user->email]);
        }
//        dd($userEmail) ;
        $body = [
            'FromEmail' => "mailjet@comite-adpa.fr",
            'FromName' => "Mailjet Pilot",
            'Subject' => "Your email flight plan!",
            'MJ-TemplateID' => 646477,
            'MJ-TemplateLanguage' => true,

            'Recipients' => $userEmail,
            'Vars' => [
                'content' => $post['content'],
                'title' => $post['title'],

            ],
        ];


//dd(Resources::$Email);
        $response = $mailjet->post(Resources::$Email, ['body' => $body]);
//        $response->success() && var_dump($response->getData());
                if ($response->success())
           echo 'succes';
        else
            var_dump($response->getStatus());
    }
    public function changePassword(Request $request){
//
//        dd($request);
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }


        $validatedData =$this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->password_change_at =Carbon::now();
        $user->email =$request['email'];
        $user->name =$request['name'];

        $user->save();

        return view('home');

    }
    public function userdata(){
        $file = public_path('file/data.csv');

        if (!file_exists($file) || !is_readable($file)) {
            return false;

        }

        $delimiter = ',';
        $header = null;
        $userdata = array();
        if (($handle = fopen($file, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $userdata[] = array_combine($header, $row);
            }
            fclose($handle);
        }
//echo phpinfo();

        for ($i = 400; $i < 500; $i++) {
            $newPassword = Hash::make($userdata[$i]['password']);
            $user = new User;
            $user->username = $userdata[$i]['username'];
            $user->password = $newPassword;
            $user->save();


        }
    }
}
