<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\PermissionInterface;
use Illuminate\Support\Facades\Log;
use App\User;


class PermissionController extends Controller
{
    
	protected $permission;

	public function __construct(PermissionInterface $permission){
		$this->permission = $permission;
	}

    public function index(User $user)
    {

    	$user_permissions = $user->getAllPermissions();
    	$rows = $this->permission->all();
    	$username = title_case($user->name);
    	$title = "User({$username}) permissions";
    	return view('dashboard.permission.index', compact('rows','user_permissions','user','title'));

    }

    public function update()
    {


    	try{
			$this->permission->update();

        } catch(\Exception $e){
        	Log::error($e->getMessage());
        	report($e);
            return back()->withErrors([
                "message" => " Somthing gone wrong, please try again"
            ]);
        }

        session()->flash('message','User\'s permissions are updated');
        return redirect()->back();
    }

    // create
    // update
    // delete
}
