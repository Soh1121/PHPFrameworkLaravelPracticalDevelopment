<?php

namespace App\Listeners;

use App\Events\PersonEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class PersonEventListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(PersonEvent $event)
    {
        Storage::append(
            'person_access_log.txt',
            '[PersonEvent] ' . now() . ' ' . $event->person->all()
        );
    }
}
