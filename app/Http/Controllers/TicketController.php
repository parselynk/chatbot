<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TicketInterface;
use App\Ticket;

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
        return view('layout.master', compact('tickets','projects'));
    }

    public function projectsOverview(){
    }
}
