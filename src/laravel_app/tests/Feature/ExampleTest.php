<?php

namespace Tests\Feature;

use App\Person;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\PersonEvent;
use App\Jobs\MyJob;
use Illuminate\Support\Facades\Queue;
use App\Listeners\PersonEventListener;
use Illuminate\Events\CallQueuedListener;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        factory(Person::class)->create();
        $person = factory(Person::class)->create();

        Queue::fake();
        Queue::assertNothingPushed();

        MyJob::dispatch($person->id)->onQueue('myjob');
        Queue::assertPushed(MyJob::class);

        Queue::assertPushedOn('myjob', MyJob::class);
    }
}
