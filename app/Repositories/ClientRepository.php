<?php 

namespace App\Repositories;

use Spatie\Regex\Regex;
use App\Repositories\Contracts\ClientInterface;



class ClientRepository implements ClientInterface {

	public $name;
	public $email;
	public $conversationDetails;
	public $conversationTopic;

	public function setName($name){
		$this->name = $name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setConversationDetails($conversationDetails){
		$this->conversationDetails = $conversationDetails;
	}

	public function setConversationTopic($topic){
		$this->conversationTopic = $topic;
	}

} 