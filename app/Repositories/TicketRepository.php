<?php 

namespace App\Repositories;

use Spatie\Regex\Regex;
use App\Repositories\Contracts\TicketInterface;
use App\Repositories\Contracts\AssigneeInterface;
use App\Repositories\Contracts\ClientInterface;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Client;
use App\Ticket;
use App\Assignee;



class TicketRepository implements TicketInterface {

	public $id;
	public $assignee;
	public $client;
	public $channel;
	public $project;


	public function __construct(AssigneeInterface $assignee, ClientInterface $client){
		$this->assignee = $assignee;
		$this->client = $client;
	}

	public function issue($payload, $other_info){
		$this->id = $this->generateID();
		$this->channel = $other_info['channel'];
		$this->project = $other_info['project'];
		$this->assignee->create($payload, new Assignee);
		$this->client->store(new Client);
		Ticket::create([
			"id" => $this->id,
			"channel" => $this->channel,
			"project" => $this->project,
			"title" => $this->client->conversationTopic,
			"body" => $this->client->conversationDetails,
			"client_id" => $this->client->id,
			"department_id" => $this->assignee->id,
		]);
		return $this;
	}

	protected function generateID($legnth = 8){
		$timestamp = Carbon::now()->timestamp;
		return $timestamp.str_random($legnth);
	}

	public function all(Model $ticket){
		return $ticket->latest()->get();
	}

	public function projectsOverview(Model $ticket){
		return $ticket->selectRaw('count(id) as count, project')
                     ->where('created_at', '>', Carbon::today()->subWeek())
                     ->groupBy('project')
                     ->get();
	}

} 