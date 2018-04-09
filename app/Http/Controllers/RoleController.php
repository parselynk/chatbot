<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Contracts\RoleInterface;
use App\Repositories\Contracts\PermissionInterface;
use Spatie\Permission\Models\Role;




class RoleController extends Controller
{
    protected $role;

	public function __construct(RoleInterface $role, PermissionInterface $permission)
	{
		$this->role = $role;
		$this->permission = $permission;
	}


	public function index()
	{
		$roles = $this->role->all();
		return view('dashboard.role.index',compact('roles'));
	}

	public function permissions(Role $role)
	{
		$rows = $this->permission->all();
		$model = $role;
		$title = "Role permissions";
		$action = "/role";
    	return view('dashboard.permission.index', compact('rows','model','title', 'action'));
	}

	public function update()
	{
		try{
			$this->role->assignPermissions();

        } catch(\Exception $e){
        	Log::error($e->getMessage());
        	report($e);
            return back()->withErrors([
                "message" => " Somthing gone wrong, please try again"
            ]);
        }

        session()->flash('message','Role\'s permissions are updated');
        return redirect()->back();
	}

}
