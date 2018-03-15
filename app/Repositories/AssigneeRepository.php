<?php 

namespace App\Repositories;

use Spatie\Regex\Regex;
use App\Repositories\Contracts\AssigneeInterface;
use Illuminate\Database\Eloquent\Model;


class AssigneeRepository implements AssigneeInterface {

	public $name;
	public $email;
    public $id;

	public function create($payload, Model $assignee){
    	
		$this->name = $this->setAssignee($payload);
        $result = $assignee->where(['name' => $this->name])->first();
        $this->email = $result->email;
        $this->id = $result->id;
    	//$this->email = env(strtoupper($this->name).'_DEPARTMENT_EMAIL');

    	return $this;
	}

	protected function setAssignee($payload){

		$assigne = '';
		switch ($payload){
    		case Regex::match('/appidea/', $payload )->hasMatch() === true :
    		$assigne = 'IT Department'; 
    	break;
    	// 	case Regex::match('/businessdigital/', $payload )->hasMatch() === true :
    	// 	$assigne = 'BUSINESS'; 
    	// break;
    	default:
    		$assigne = 'Help Center'; 
    	} 

    return $assigne;

	}

}