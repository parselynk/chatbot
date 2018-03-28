<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ticket;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\TicketInterface', 'App\Repositories\TicketRepository');
        $this->app->bind('App\Repositories\Contracts\AssigneeInterface', 'App\Repositories\AssigneeRepository');
        $this->app->bind('App\Repositories\Contracts\ClientInterface', 'App\Repositories\ClientRepository');
        //inject a new instance of Ticket model to TicketRepository
        $this->app->when('App\Repositories\TicketRepository')->needs('$model')->give(function(){
            return new Ticket;
        });
    }
}
