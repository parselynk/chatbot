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

    public function delete($permission_name)
    {

        if(empty($permission_name) || !isset($permission_name)){
            return back()->withErrors([
                "message" => "No permission is selected"
            ]); 
        }

        try{
            $this->permission->delete($permission_name);

        } catch(\Exception $e){
            Log::error($e->getMessage());
            report($e);
            return back()->withErrors([
                "message" => $e->getMessage()
            ]);
        }

        session()->flash('message','Permission is deleted');
        return redirect()->back();
       
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

    public function create()
    {
        $rows = $this->permission->all();
        $title = "Add new permissions";
        return view('dashboard.permission.create', compact('rows','title'));
    }

    public function store()
    {
        dd(request()->all());
        $this->validate(request(), 
            ['name' => 'required|min:4',
            'category' => 'required', 
            'action' => 'required']
        );

    $name = request('category').'-'.request('action').'-'.strtolower(request('name'));
    $guard = null !== request('guard_name') ? request('guard_name') : null ;
    try{
        $this->permission->create($name, $guard);
        } catch(\Exception $e){
            Log::error($e->getMessage());
            report($e);
            return back()->withErrors([
                "message" => $e->getMessage()
            ]);
        }
        session()->flash('message','New permission  "'. $name .'"  is registered');
        return redirect()->back();
     }

    // create
    // update
    // delete
}
