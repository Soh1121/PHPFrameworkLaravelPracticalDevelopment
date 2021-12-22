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
        // $this->get('/hello/' . $person->id)->assertOk();
        $this->get('/hello')->assertOk();
        Event::assertDispatched(PersonEvent::class);
    }
}
