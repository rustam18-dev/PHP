<?php

namespace App\Providers;

use App\Listeners\SendTaskCreatedNotification;
use App\Events\TaskCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

Event::listen(Registered::class, SendEmailVerificationNotification::class);
Event::listen(TaskCreated::class, SendTaskCreatedNotification::class);
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */

//    protected $listen = [
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//        ],
//        TaskCreated::class => [
//            SendTaskCreatedNotification::class,
//        ],
//    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
