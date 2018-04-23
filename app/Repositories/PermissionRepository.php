<?php

namespace App\Repositories;

use App\Repositories\Contracts\PermissionInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Repositories\Contracts\TicketInterface;
use App\User;

class PermissionRepository implements PermissionInterface
{
    
    use HasRoles;
    protected $user;
    protected $ticket;

    public function __construct(TicketInterface $ticket, $user)
    {
        $this->user = $user;
        $this->ticket = $ticket;
    }


    public function all()
    {
        $permissions = $this->systemPermissions();
        return prepare_permissions($permissions);
    }

    public function registeredPermissions()
    {
        return array_flatten(Permission::select('name')->get()->toArray());
    }

    public function ticketPermissions()
    {

        $permissions = $this->ticket->permissions();

        return prepare_ticket_permissions($permissions);
    }

    public function systemPermissions()
    {
        return Permission::get();
    }

    public function permissionsToReset($user)
    {
        $is_ticket_permission = request('ticket-permission');
        return isset($is_ticket_permission) ?  generateUserTicketPermission($user->getAllPermissions()) : $user->getAllPermissions();
    }


    public function update()
    {
        
        $permissions = request()->all();
        //$ticket_permission = request('ticket-permission');
        unset($permissions["_token"]);
        unset($permissions["ticket-permission"]);
        $user = $this->user->find(request('model-id'));

        unset($permissions["model-id"]);

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $user->revokePermissionTo($this->permissionsToReset($user));
        if (!$user->givePermissionTo($permissions)) {
            throw new \Exception();
        }
       
        return true;
    }

    protected function exists($name, $guard = null)
    {
        $prmission_exist = ($guard) ?
            Permission::where('name', $name) :
            Permission::where('name', $name)->where('guard_name', $guard);
        if ($prmission_exist->count() === 0) {
            return false;
        }

        return true;
    }

    public function create($name, $guard = null)
    {
        
        if (!$this->exists($name, $guard)) {
            return Permission::create(['name' => $name]);
        }

        throw new \Exception('Permission already Exist');
    }


    public function delete($permission_name)
    {
        $query = Permission::where('name', 'like', '%-'.$permission_name);
        if ($query->count() === 0) {
            throw new \Exception('Permission does not exist.');
        }
        return $query->delete();
    }
}
