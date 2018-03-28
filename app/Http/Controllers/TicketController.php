<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TicketInterface;
use App\Assignee;

class TicketController extends Controller
{
    
	protected $ticket;

	public function __construct(TicketInterface $ticket){
        
        $this->middleware('auth');
		$this->ticket = $ticket;
	}

    public function index(){
    	//return view('posts.index', compact('posts','archives'));
        return view('layout.master');
    }

    public function all(){
        
        $tickets = $this->ticket->all();
        $projects = $this->ticket->projectsOverview();
        $assignees = $this->ticket->assigneesOverview();
        $channels = $this->ticket->channelsOverview();
        $filters = $this->ticket->availableFilters();
        return view('dashboard.index', compact('tickets','projects','assignees','channels','filters'));
    }

    public function test(){
    	$ticket = new Ticket;
    	dd($this->ticket->availableFilters());

    }
}
