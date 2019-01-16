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
        $user = Auth::user();
         $request->get('new-password');
         if ($request->get('new-password')!== null || $request->get('email')==null ){

             if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                 // The passwords matches
                 return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
             }

             if(strcmp($request->get('current-password'), $request->get('Â')) == 0){
                 //Current password and new password are same
                 return redirect()->back()->with("error","Nouveau mot de passe ne peut pas être identique à votre mot de passe actuel. Veuillez choisir un mot de passe différent.");
             }


             $this->validate($request, [
                 'current-password' => 'required',
                 'new-password' => 'required|string|min:6|confirmed',
                 'name' => 'required|string|max:255',
                 'prenom' => 'required|string|max:255',
                 'email' => 'required|string|email|max:255',
             ]);
             if ($request->get('email')==null ){
                 $this->validate($request, [

                     'email' => 'required|string|email|max:255|unique:users',
                 ]);
             }
             $user->password = bcrypt($request->get('new-password'));
             $user->password_change_at =Carbon::now();
         }
        $user->email =$request['email'];
        $user->name =$request['name'];
        $user->address =$request['address'];
        $user->prenom =$request['prenom'];
        $user->tel =$request['tel'];


        //Change Password

        $user->save();

//        return redirect()->back()->with("success","Password changed successfully !");

        return redirect('/page/6');
    }


    public function userdata(){
        dd('homeControler');
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
