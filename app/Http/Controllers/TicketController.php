<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TicketInterface;
use App\Ticket;
use App\Assignee;

class TicketController extends Controller
{
    
	protected $ticket;

	public function __construct(TicketInterface $ticket){
		$this->ticket = $ticket;
	}

    public function index(){
    	//return view('posts.index', compact('posts','archives'));
        return view('layout.master');
    }

    public function all(){
        
    	$ticket = new Ticket;
        $tickets = $this->ticket->all($ticket);
        $projects = $this->ticket->projectsOverview($ticket);
        $assignees = $this->ticket->assigneesOverview($ticket);
        $channels = $this->ticket->channelsOverview($ticket);
        $filters = $this->ticket->availableFilters($ticket);
        return view('dashboard.index', compact('tickets','projects','assignees','channels','filters'));
    }

    public function test(){
    	$ticket = new Ticket;
    	dd($this->ticket->availableFilters($ticket));

    }
}
