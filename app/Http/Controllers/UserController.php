<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form
    public function create(){
        return view('users.register');

    }

    //register new user
    public function store(Request $request){
        // laravel offers validate() helper method 
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::Unique('users', 'email')],
            //used or '|' coz hashed out rules with commas bring error 3:27:45 
            'password' => 'required|confirmed|min:6'    //['required, confirmed, min:6']...commas',' had errors so used or'|'
        ]);

        //to hash passwords,bcrypt avalilable in laravel(common in express.js)
        $formFields['password'] = bcrypt($formFields['password']);

        //create User
        $user = User::create($formFields);

        //login the user that was created using auth() helper
        auth()->login($user);

        //redirect
        return redirect('/listings')->with('message','User created and logged in');
    }

    //logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->invalidate();
        
        return redirect('/listings')->with('message','User logged out');
    }
}
