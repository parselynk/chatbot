<?php 

namespace App\Repositories;
use App\Repositories\Contracts\RoleInterface;
use Spatie\Permission\Models\Role;



class RoleRepository implements RoleInterface 
{
	public function all()
	{
		return Role::get();
	}

	public function getRole($id)
	{
		return Role::find($id);
	}

	public function getAssignedPermissions(Role $role)
	{
		$permissions = $role->permissions;
	
		return $permissions;
	}

	public function assignPermissions()
	{

		$permissions = request()->all();
		unset($permissions["_token"]);
		$role = Role::find(request('model-id'));
		unset($permissions["model-id"]);
		$role->revokePermissionTo($role->permissions);
        
            if(!$role->givePermissionTo($permissions)){
            	throw new \Exception();
            }
       
        return true;
	}

}