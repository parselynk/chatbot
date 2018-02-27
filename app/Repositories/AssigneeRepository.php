<?php 

namespace App\Repositories;

use Spatie\Regex\Regex;
use App\Repositories\Contracts\AssigneeInterface;

class AssigneeRepository implements AssigneeInterface {

	public $name;
	public $email;

	public function create($payload){
    	
		$this->name = $this->setAssignee($payload);
    	$this->email = env(strtoupper($this->name).'_DEPARTMENT_EMAIL');

    	return $this;
	}

	protected function setAssignee($payload){

		$assigne = '';
		switch ($payload){
    		case Regex::match('/appidea/', $payload )->hasMatch() === true :
    		$assigne = 'IT'; 
    	break;
    		case Regex::match('/businessdigital/', $payload )->hasMatch() === true :
    		$assigne = 'BUSINESS'; 
    	break;
    	default:
    		$assigne = 'HELPCENTER'; 
    	} 

    return $assigne;

	}

}