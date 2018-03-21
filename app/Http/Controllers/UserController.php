<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){

    	$users = User::latest()->get();

    	return view('users.index',compact('users'));
    }
}
