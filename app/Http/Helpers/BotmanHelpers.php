<?php

function prepare_permissions($permissions){
	if(is_array($permissions) && count($permissions) === 0){
			return $permissions_list;
		}

		$permissions_list = [];
		
		foreach ($permissions as $permission){
			$permission_array = explode('-', $permission->name);
			if(count($permission_array) === 3) {
				$first_segment = $permission_array[0];
				if(starts_with(strtolower($permission->name), 'sa')){
					$permissions_list['super-admin'][$permission_array[2]][$permission_array[1]] = $permission->name;
				} elseif(starts_with(strtolower($permission->name), 'a')){
					$permissions_list['admin'][$permission_array[2]][ $permission_array[1]] = $permission->name;
				} else {
					$permissions_list['miscellaneous'][$permission_array[2]][$permission_array[1]] = $permission->name;
				}
			}
		}

	return $permissions_list;
}


function prepare_ticket_permissions($permissions)
{
	if(is_array($permissions) && count($permissions) === 0){
			return $permissions_list;
		}
		$permissions_list = [];
		foreach ($permissions as $permission){
			$permission_array = explode('-', $permission);
			if(count($permission_array) === 4) {
				$last_segment = $permission_array[3];
				$permissions_list[$last_segment][$permission_array[2]][$permission_array[1]] = $permission;
			}
		}

	return $permissions_list;
}



function generateTicketPermission($permissions, $permission_group)
{
	if(is_array($permissions) && count($permissions) === 0){
			return $permissions_list;
		}
		$permissions_list = [];
		foreach ($permissions as $permission){
			$permissions_list[] = "ms-view-$permission-$permission_group";
		}
	return $permissions_list;
}


function isInArray($array, $item)
{
	return in_array($item, array_flatten($array)) ? true : false;
}