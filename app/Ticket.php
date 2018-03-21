<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Assignee;
use Carbon\Carbon;

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

    public function scopeFilter($query, $filters){
        if ($filters){
            if ($date = $filters['date-filter']){
                if($date != 'all'){
                  $query->whereDate('created_at', '>=', Carbon::parse($date)->format('Y-m-d'));
                }
            }
            if ($assignee = $filters['assignee-filter']){
                $query->whereHas('assignee', function ($query) use ($assignee) {
                    $query->where('name',  $assignee);
                });
            }
            if ($channel = $filters['channel-filter']){
                $query->where('channel', $channel);
            }

            if ($project = $filters['project-filter']){
                $query->where('project', $project);
            }
        } else {
            $query->where('created_at', '>', Carbon::today()->subWeek());
        }

    }
}
