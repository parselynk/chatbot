<?php 

namespace App\Repositories;
use App\Repositories\Contracts\PermissionInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\User;




class PermissionRepository implements PermissionInterface
{
	
    use HasRoles;
	protected $user;

	public function __construct($user)
	{
		$this->user = $user;
	}


	public function all(){
		$permissions = Permission::get();
		$permissions_list = [];
		if(count($permissions) === 0){
			return $permissions_list;
		}
		foreach ($permissions as $permission){
			$permission_array = explode('-', $permission->name);
			$first_segment = $permission_array[0];
			if(starts_with(strtolower($permission->name), 'sa')){
				$permissions_list['super-admin'][$permission_array[2]][$permission_array[1]] = $permission->name;
			} elseif(starts_with(strtolower($permission->name), 'a')){
				$permissions_list['admin'][$permission_array[2]][ $permission_array[1]] = $permission->name;
			} else {
				$permissions_list['miscellaneous'][$permission_array[2]][$permission_array[1]] = $permission->name;
			}
		}

		return $permissions_list;
	}

	public function update(){
		
		$permissions = request()->all();
		unset($permissions["_token"]);
		$user = $this->user->find(request('user-id'));
		unset($permissions["user-id"]);

		$user->revokePermissionTo($user->getAllPermissions());
        
            if(!$user->givePermissionTo($permissions)){
            	throw new \Exception();
            }
       
        return true;
	}

	public function create($name, $guard = null){
		echo "Repository name is: $name & Guard is: $guard";
		$prmission_exist = ($guard) ? 
			Permission::where('name' , $name) : 
			Permission::where('name' , $name)->where('guard_name' , $guard);
			print_r($prmission_exist->get());
	   if( !$prmission_exist->count()) {
	   	echo 'Count: '.$prmission_exist->count();die;
	   		return Permission::create(['name' => $name]);
	   }

	   throw new \Exception('Permission already Exist');
	}


    public function delete($permission_name)
    {
    	$query = Permission::where('name' , 'like' , '%-'.$permission_name);
        if ($query->count() === 0){
            throw new \Exception('Permission does not exist.');
        }
        return $query->delete();
    }
}


