<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\PermissionInterface;
use Illuminate\Support\Facades\Log;
use App\User;

class PermissionController extends Controller
{
    
    protected $permission;

    public function __construct(PermissionInterface $permission)
    {
        $this->permission = $permission;
    }

    public function index(User $user)
    {

        $user_permissions = $user->getAllPermissions();
        $model = $user;
        $rows = $this->permission->all();
        $username = title_case($user->name);

        $registered_permissions = $this->permission->registeredPermissions();

        
        if ($user->hasRole('miscellaneous')) {
            $user_ticket_permissions = generateUserTicketPermission($user->getAllPermissions());
            $ticket_permissions = prepare_ticket_permissions($user_ticket_permissions);
        }

        $title = "User({$username}) permissions";
        $action = "/permission";
        $user_role_update = true;
        return view(
            'dashboard.permission.index',
            compact(
                'rows',
                'user_permissions',
                'model',
                'title',
                'action',
                'user_role_update',
                'ticket_permissions',
                'registered_permissions'
            )
        );
    }

    public function delete($permission_name)
    {

        if (empty($permission_name) || !isset($permission_name)) {
            return back()->withErrors([
                "message" => "No permission is selected"
            ]);
        }

        try {
            $this->permission->delete($permission_name);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            report($e);
            return back()->withErrors([
                "message" => $e->getMessage()
            ]);
        }
        Cache()->flush();
        session()->flash('message', 'Permission is deleted');
        return redirect()->back();
    }

    public function update()
    {
        try {
            $this->permission->update();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            report($e);
            return back()->withErrors([
                "message" => " Somthing gone wrong, please try again"
            ]);
        }

        session()->flash('message', 'User\'s permissions are updated');
        return redirect()->back();
    }

    public function create()
    {
        $rows = $this->permission->all();
        $registered_permissions = array_flatten($rows);

        $available_actions = [];

        foreach (config('navigations')['navigations'] as $name => $groups) {
            foreach ($groups as $name => $nav) {
                if ($nav['permission']) {
                    $available_actions[] =  $nav['permission'];
                }
            }
        }

        $remaining_permissions = array_diff($available_actions, $registered_permissions);

        $title = "Permissions";
        return view('dashboard.permission.create', compact('rows', 'title', 'remaining_permissions'));
    }

    public function store()
    {
        $this->validate(
            request(),
            ['permission' => 'required']
        );

        $name = request('permission');
        $guard = null !== request('guard_name') ? request('guard_name') : null ;
        try {
            $this->permission->create($name, $guard);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            report($e);
            return back()->withErrors([
            "message" => $e->getMessage()
            ]);
        }
        session()->flash('message', 'New permission  "'. $name .'"  is registered');
        return redirect()->back();
    }

    public function projects(User $user)
    {
        $user_permissions = $user->getAllPermissions();
        $username = title_case($user->name);

        $registered_permissions = $this->permission->registeredPermissions();

        
        if ($user->hasRole('miscellaneous')) {
            $ticket_permissions =   $this->permission->ticketPermissions();
            $projects = array_keys($ticket_permissions);
        }

        $action = url("permission/{$user->id}/ticket");
        $page_title = "User({$username}) ticket permissions";
        $user_role_update = true;
        $project = '';
       
        return view(
            'dashboard.permission.ticketpermissiontable',
            compact(
                'user_permissions',
                'user',
                'page_title',
                'projects',
                'project',
                'action',
                'registered_permissions'
            )
        );
    }


    public function projectPermissions(User $user, $project)
    {
        

        $user_permissions = $user->getAllPermissions();
        $username = title_case($user->name);

        $registered_permissions = $this->permission->registeredPermissions();

        
        if ($user->hasRole('miscellaneous')) {
            $ticket_permissions =   $this->permission->ticketPermissions();
            $projects = array_keys($ticket_permissions);
        }

        $page_title = "User({$username}) ticket permissions";
        $action = url("permission/{$user->id}/ticket");
        $user_role_update = true;
       
        return view(
            'dashboard.permission.ticketpermissiontable',
            compact(
                'user_permissions',
                'user',
                'page_title',
                'action',
                'projects',
                'project',
                'user_role_update',
                'ticket_permissions',
                'registered_permissions'
            )
        );
    }

    // create
    // update
    // delete
}
