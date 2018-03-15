<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Assignee extends Model
{
    public function ticket(){
    	return $this->hasMany(Ticket::class);
    }
}
