<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function addUsersBlade()
    {
        return view('users.addUsers');
    }
    protected function addUsers(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|max:255|unique:users',

        ]);
//        dd($request->password);
                    $newPassword = Hash::make($request->password);

        $user = new User;
            $user->username = $request->username;

        $user->password = $newPassword;
            $user->save();
        return back();

    }
    protected function usersList()
    {
        $users = User::All();
        return view('users.usersList', compact('users'));
    }
    public function edit(User $user)
    {
        return view('/users.edit',['user' => $user]);

    }
    public function userUpdate(Request $request){



            $this->validate($request, [
                'name' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);




        $user->email =$request['email'];
        $user->name =$request['name'];

        $user->prenom =$request['prenom'];


        $user->save();


        return back();
    }

}
