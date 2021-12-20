<?php

namespace App\Events;

use App\Person;
use Illuminate\Queue\SerializesModels;

class PersonEvent
{
    use SerializesModels;

    public $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }
}
