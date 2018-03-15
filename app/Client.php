<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;


class Client extends Model
{
    protected $fillable = ['name', 'email'];

    public function ticket(){
    	return $this->hasMany(Ticket::class);
    }
}
