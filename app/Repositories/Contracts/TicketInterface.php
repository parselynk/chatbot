<?php

namespace App\Repositories\Contracts;

interface TicketInterface {

	public function issue($payload);

}