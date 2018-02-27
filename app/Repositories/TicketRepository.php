<?php 

namespace App\Repositories;

use Spatie\Regex\Regex;
use App\Repositories\Contracts\TicketInterface;
use App\Repositories\Contracts\AssigneeInterface;
use App\Repositories\Contracts\ClientInterface;




class TicketRepository implements TicketInterface {

	public $assignee;
	public $client;


	public function __construct(AssigneeInterface $assignee, ClientInterface $client){
		$this->assignee = $assignee;
		$this->client = $client;
	}

	public function issue($payload){
		$this->assignee->create($payload);
		return $this;
	}

} 