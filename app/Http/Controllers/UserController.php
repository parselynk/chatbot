<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    
	public function __construct(){
        
        $this->middleware('auth');
	}

    public function index(){

    	$users = User::latest()->get();

    	return view('users.index',compact('users'));
    }

    public function edit(){

    	$user = Auth::user();

    	return view('users.edit',compact('user'));
    }

    public function profile(){

    	$user = Auth::user();

    	return view('users.profile',compact('user'));
    }

    public function resetPassword(){

        return view('users.resetpassword');
    }

    public function resetForgottenPassword($token){


        return view('users.profile');
    }
}
