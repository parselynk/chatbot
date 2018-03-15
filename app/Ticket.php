<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Assignee;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'body', 'department_id','client_id','title','project','channel'
    ];

    public function client(){
    	return $this->belongsTo(Client::class);
    }

    public function assignee(){
    	return $this->belongsTo(Assignee::class , 'department_id');
    }
}
