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
		return prepare_permissions($permissions);
	}

	public function update(){
		
		$permissions = request()->all();
		unset($permissions["_token"]);
		$user = $this->user->find(request('model-id'));
		unset($permissions["model-id"]);

		$user->revokePermissionTo($user->getAllPermissions());
        
            if(!$user->givePermissionTo($permissions)){
            	throw new \Exception();
            }
       
        return true;
	}

	public function create($name, $guard = null){
		$prmission_exist = ($guard) ? 
			Permission::where('name' , $name) : 
			Permission::where('name' , $name)->where('guard_name' , $guard);
	   if( $prmission_exist->count() === 0) {
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


