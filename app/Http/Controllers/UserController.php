<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use App\User;
use Auth;

class UserController extends Controller
{
    
	public function __construct()
    {
        
        $this->middleware('auth');
	}

    public function index()
    {

    	$users = User::latest()->get();

    	return view('users.index',compact('users'));
    }

    public function edit()
    {

    	$user = Auth::user();

    	return view('users.edit',compact('user'));
    }

    public function updateRole()
    {

        $this->validate(request(), 
            [
                'role' => 'required',
                'user-id' => 'required',
            ]
        );

        try{
            //fetch user
            $user = User::find(request('user-id'));
            //fetsh user roles
            $roles = $user->getRoleNames();

            //remove all user roles first
            foreach( $roles as $role) {
                $user->removeRole($role); 
            }
            // asssign new role to user
            $user->assignRole(request('role'));        
        } catch(\Exception $e){
            Log::error($e->getMessage());
            report($e);
            return back()->withErrors([
                "message" => "Somthing gone wrong, Try again"
            ]);
        }

        session()->flash('message','User role is updated');
        return redirect()->back();
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
