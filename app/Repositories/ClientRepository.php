<?php 

namespace App\Repositories;

use Spatie\Regex\Regex;
use App\Repositories\Contracts\ClientInterface;
use Illuminate\Database\Eloquent\Model;



class ClientRepository implements ClientInterface {

	public $name;
	public $email;
	public $id;
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

	public function store(Model $client){
		$existingRecord = $client->where('email', $this->email);
		$result = $existingRecord->first();
		$client->where('email', $this->email)->update(['email' => $this->email]);
		
		if ($existingRecord->count() == 0) {
			$result = $client->create(['name'=> $this->name, 'email'=>$this->email]);
		}

		$this->id = $result->id;
	}

} 