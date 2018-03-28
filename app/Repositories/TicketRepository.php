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
	protected $ticket;


	public function __construct(AssigneeInterface $assignee, ClientInterface $client, /** Model*/ $model){
		$this->assignee = $assignee;
		$this->client = $client;
		$this->ticket = $model; // for decoupling purpose.
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

	public function all(){
		$tickets = $this->ticket->latest();
		$tickets->filter(request(['startdate-filter','enddate-filter','project-filter','channel-filter','assignee-filter']));
		return $tickets->get();
	}

	public function projectsOverview(){
		return $this->ticket->selectRaw('count(id) as count, project as name')
                     ->where('created_at', '>=', Carbon::today()->subWeek())
                     ->groupBy('project')
                     ->get()
                     ->toArray();
	}

	public function channelsOverview(){
		return $this->ticket->selectRaw('count(id) as count, channel as name')
                     ->where('created_at', '>=', Carbon::today()->subWeek())
                     ->groupBy('channel')
                     ->get();
	}

	public function assigneesOverview(){
		return $this->ticket->selectRaw('assignees.name, COUNT(tickets.id) as count')
		            ->join('assignees', 'tickets.department_id', '=', 'assignees.id')
                     ->where('tickets.created_at', '>=', Carbon::today()->subWeek())
                     ->groupBy('department_id')
                     ->get();
	}

	public function availableFilters(){
		
		$department = $this->ticket->selectRaw('assignees.name as assignee, null as project, null as channel')
				             ->join('assignees', 'tickets.department_id', '=', 'assignees.id')
						     ->groupBy('tickets.department_id');
		   
		   $project = $this->ticket->selectRaw('null as assignee, project, null as channel')
						     ->groupBy('project');
		
		return $this->ticket->selectRaw('null as assignee, null as project, channel')
						     ->groupBy('channel')
						     ->union($department)
						     ->union($project)
						     ->get();

	}
} 