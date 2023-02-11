<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskCreatedNotification
{

    public function handle(TaskCreated $event)
    {
        \Mail::to($event->task->owner->email)->send(
            new \App\Mail\TaskCreated($event->task)
        );
    }
}
