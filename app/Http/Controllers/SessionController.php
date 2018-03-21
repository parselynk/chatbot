<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
    	return view('sessions.create');
    }

    public function destroy(){
    	auth()->logout();
    	return redirect('/login');
    	
    }

    public function store(){
    	$this->validate(request(), 

    		['email' => 'required',
    		'password' => 'required']	
    	);

    	if(!auth()->attempt(request(['email','password']))) {
    		return back()->withErrors([
    			'message' => ' Check your credentials and try again.'
    		]);
    	}

    	return redirect()->home();
    	
    }
}
