<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }
}
