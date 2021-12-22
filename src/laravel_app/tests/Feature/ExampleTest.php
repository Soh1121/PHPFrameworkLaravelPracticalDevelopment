<?php

namespace Tests\Feature;

use App\Person;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use App\Events\PersonEvent;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        factory(Person::class)->create();
        $person = factory(Person::class)->create();

        Event::fake();
        Event::assertNotDispatched(PersonEvent::class);
        event(new PersonEvent($person));
        Event::assertDispatched(PersonEvent::class);
        Event::assertDispatched(
            PersonEvent::class,
            function ($event) use ($person) {
                return $event->person === $person;
            }
        );
    }
}
