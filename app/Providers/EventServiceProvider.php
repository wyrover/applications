<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\EmailRefereeOne' => [
            'App\Listeners\EmailRefereeOneListener',
        ],
        'App\Events\EmailRefereeTwo' => [
            'App\Listeners\EmailRefereeTwoListener',
        ],
        'App\Events\ReferenceRequestEmail' => [
            'App\Listeners\ReferenceRequestListener'
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
