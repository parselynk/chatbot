<?php


function prepare_permissions($permissions)
{
    if (is_array($permissions) && count($permissions) === 0) {
            return $permissions_list;
    }

        $permissions_list = [];
        
    foreach ($permissions as $permission) {
        $permission_array = explode('-', $permission->name);
        if (count($permission_array) === 3) {
            $first_segment = $permission_array[0];
            if (starts_with(strtolower($permission->name), 'sa')) {
                $permissions_list['super-admin'][$permission_array[2]][$permission_array[1]] = $permission->name;
            } elseif (starts_with(strtolower($permission->name), 'a')) {
                $permissions_list['admin'][$permission_array[2]][ $permission_array[1]] = $permission->name;
            } else {
                $permissions_list['miscellaneous'][$permission_array[2]][$permission_array[1]] = $permission->name;
            }
        }
    }

    return $permissions_list;
}

/**
 * [prepare_ticket_permissions description]
 * @param  [array] $permissions [description]
 * @return [array]
 */
function prepare_ticket_permissions($permissions)
{
    if (is_array($permissions) && count($permissions) === 0) {
            return [];
    }
    $permissions_list = [];

    foreach ($permissions as $permission) {
        $permission_array = explode('-', strtolower($permission));
        if (count($permission_array) === 5) {
            $key = $permission_array[2];
            $permissions_list[$key]["assignees"][$permission_array[3]] = $permission;
            $permissions_list[$key]["channels"][$permission_array[4]] = $permission;
        }
    }
    return $permissions_list;
}

function generateUserTicketPermission($permissions)
{

    if (is_array($permissions) && count($permissions) === 0) {
            return [];
    }

    $permissions_list = [];
    foreach ($permissions as $permission) {
        $permission_array = explode('-', $permission->name);
        if (count($permission_array) === 5) {
            $permissions_list[] = $permission->name;
        }
    }
    return $permissions_list;
}
/**
 * [Prepares filter based on user's permissions]
 * @param  [Object] $user [App\User]
 * @return [array]        [Filter array]
 */
function userTicketPermission($user)
{
    $permissions_list = [];
    if (!isset($user) || !$user || $user->isSuperAdmin() || $user->isAdmin()) {
        return $permissions_list;
    }
    
    $permissions = $user->permissions;
    foreach ($permissions as $permission) {
        $permission_array = explode('-', $permission->name);
        if (count($permission_array) === 5) {
            $permissions_list['channel'][] = $permission_array[4];
            $permissions_list['assignee'][] = $permission_array[3];
            $permissions_list['project'][] = $permission_array[2];
            $permissions_list['query'][$permission_array[2]]['assignee'][] = $permission_array[3];
            $permissions_list['query'][$permission_array[2]]['channel'][] = $permission_array[4];
        }
    }

    $result['channel'] = isset($permissions_list['channel']) ? array_unique($permissions_list['channel']) : [];
    $result['assignee'] = isset($permissions_list['assignee']) ? array_unique($permissions_list['assignee']) : [];
    $result['project'] = isset($permissions_list['project']) ? array_unique($permissions_list['project']) : [];
    $result['query'] = isset($permissions_list['query']) ? array_unique($permissions_list['query']) : [];
    return $result;
}


/**
 * [Generate tickets permissions on fly]
 * @param  [array] $tickets      [array of $ticket]
 * @return [type]                   [description]
 */
function generateTicketPermission($tickets)
{
    if (is_array($tickets) && count($tickets) === 0) {
            return $permissions_list;
    }
        $permissions_list = [];
    foreach ($tickets as $ticket) {
        $assignee = ($ticket->assignee)->name;
        $permissions_list[] = "ms-view-{$ticket->project}-{$assignee}-{$ticket->channel}";
    }
    return $permissions_list;
}


function isInArray($array, $item)
{
    return in_array($item, array_flatten($array)) ? true : false;
}
