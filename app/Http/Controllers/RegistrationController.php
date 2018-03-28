<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;


class RegistrationController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
    	return view('registration.create');
    }

    public function store(){

    	$this->validate(request(),[
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed|min:6',
    	]);

        try{

        $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);        
        } catch(\Exception $e){
            return back()->withErrors([
                "message" => " This Email already exists. "
            ]);
        }

        session()->flash('message','User: "'. request('name') .'" has been created.');

    	return redirect('/user');
    }
}
