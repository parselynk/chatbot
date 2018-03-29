<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    public function askForEmail()
    {
    	
    	return view('users.forgetpasswordemail');
    }

    public function sendToken()
    {
    	$this->validate(request(), 
    		['email' => 'required|email']
    	);

    	$user = User::where('email', request('email'))->first();

    	if ($user){
    	    $forgotepasswordemail = new ForgotPasswordEmail($user, $this->createToken($user->email));
    		\Mail::to($user)->send($forgotepasswordemail);
    		
    		session()->flash('message','The reset password link has been sent to your email');
        	return redirect()->back();
    	}
    	return back()->withErrors([
            "message" => " This Email is not registered. "
        ]);

    }

    protected function createToken($email){
    	$token = str_random(60);
    	DB::table('password_resets')->insert([
	        'email' => $email,
	        'token' => $token,
	        'created_at' => Carbon::now()
    	]);
    	
    	return $token;
    }

    public function askForNewPassword()
    {
        $message =  'Token is invalid';
    	$token = DB::table('password_resets')->where('token', request('token'));

    	if($token->count() == 0){
    		return view('users.tokeninvalid', compact('message'));
    	}

    	$tokenObject = $token->first();
    	$tokenExpiry = Carbon::parse($tokenObject->created_at)->addMinutes(15) >= Carbon::now() ? true : false;
    	if (!$tokenExpiry) {
    		$message =  'Token is expired';
			return view('users.tokeninvalid', compact('message'));
    	}


    	$user = User::where('email', $tokenObject->email )->first();
    	return view('users.resetforgottenpassword', compact('user'));
    	
    }

    public function store()
    {
        $this->validate(request(),[
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email',
        ]);

        $user = User::where('email', request('email'))->first();

        if(!$user){
            return back()->withErrors([
                "message" => " User does not exist. "
            ]);
        }


        try{
            $user->update(['password' => bcrypt(request('password'))]);
        } catch(\Exception $e){
            return back()->withErrors([
                "message" => " Reset password failed, Please try again. "
            ]);
        }

        session()->flash('message','Your password has been updated successfully.');
        return redirect('/login');
    }
}

