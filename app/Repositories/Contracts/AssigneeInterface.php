<?php

namespace App\Repositories\Contracts;
use Illuminate\Database\Eloquent\Model;


interface AssigneeInterface {

	public function create($payload, Model $assignee);

}