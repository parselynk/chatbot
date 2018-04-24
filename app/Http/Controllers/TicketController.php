<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TicketInterface;
use App\Assignee;

class TicketController extends Controller
{
    
    protected $ticket;

    public function __construct(TicketInterface $ticket)
    {
        
        $this->middleware('auth');
        $this->ticket = $ticket;
    }

    // public function index(){
    //  //return view('posts.index', compact('posts','archives'));
    //     return view('layout.master');
    // }

    public function index()
    {
        
        $user = auth()->user();
        $userFilters = userTicketPermission($user);
        $tickets = $this->ticket->all($userFilters);
        $projects = $this->ticket->projectsOverview();
        $assignees = $this->ticket->assigneesOverview();
        $channels = $this->ticket->channelsOverview();
        $filters = ($user->isSuperAdmin() || $user->isAdmin()) ? $this->ticket->availableFilters() : $userFilters;
        return view('dashboard.index', compact('tickets', 'projects', 'assignees', 'channels', 'filters', 'user'));
    }

    public function tickets()
    {
        
        $user = auth()->user();
        $userFilters = userTicketPermission($user);
        $tickets = $this->ticket->all($userFilters);
        $filters = ($user->isSuperAdmin() || $user->isAdmin()) ? $this->ticket->availableFilters() : $userFilters;
        return view('dashboard.tickets', compact('tickets', 'filters', 'user'));
    }

    public function test()
    {
        $ticket = new Ticket;
        dd($this->ticket->availableFilters());
    }
}
