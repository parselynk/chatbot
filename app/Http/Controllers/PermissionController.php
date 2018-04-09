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
        $model = $user;
    	$rows = $this->permission->all();
    	$username = title_case($user->name);
    	$title = "User({$username}) permissions";
        $action = "/permission";
    	return view('dashboard.permission.index', compact('rows','user_permissions','model','title','action'));

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
        Cache()->flush();
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
        $registered_permissions = array_flatten($rows);

        $available_actions = [];

        foreach(config('navigations')['navigations'] as $name => $groups){
           foreach($groups as $name => $nav){
                if($nav['permission']){
                    $available_actions[] =  $nav['permission'];
                }
            }
        }

        $remaining_permissions = array_diff($available_actions, $registered_permissions);


        // $sorted = array_map(function($value){
        //     $seperated = explode('-',$value);
        //     $key = '';
        //     $key  .=  strtolower($seperated[0]) == 'sa' ? 'Super Admin' : ((strtolower($seperated[0]) == 'a') ? 'Admin' : 'Miscellaneous');
        //     return  [$key => $value] ;

        // }, $remaining_permissions);


        $title = "Permissions";
        return view('dashboard.permission.create', compact('rows','title','remaining_permissions'));
    }

    public function store()
    {
        $this->validate(request(), 
            ['permission' => 'required']
        );

    $name = request('permission');
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
