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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id_email.required' => 'User name or Email is required',
        ];
    }

    public function store(Request $request)
    {
    	$this->validate(request(), 

    		['id_email' => 'required',
    		'password' => 'required'],
            $this->messages()
    	);

        $field = filter_var(request()->input('id_email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        request()->all()[$field] = request('id_email');
        $request->request->add([$field => request('id_email')]);

    	if(!auth()->attempt(request([$field ,'password']))) {
    		return back()->withErrors([
    			'message' => ' Check your credentials and try again.'
    		]);
    	}

    	return redirect()->home();
    	
    }

    public function update()
    {
        $this->validate(request(), 
            ['email' => 'required|email',
            'name' => 'required']
            );
        $user = auth()->user();
        try{
            $user->update(request(['name','email']));
        } catch(\Exception $e){
            return back()->withErrors([
                "message" => " This Email already exists. "
            ]);
        }
        session()->flash('message','Profile has been updated');

        return redirect()->back();

    }
}
