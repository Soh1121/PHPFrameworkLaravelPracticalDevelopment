<?php

namespace Tests\Feature;

use App\Person;
use DatabaseSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use App\Jobs\MyJob;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $id = 1;
        $data = [
            'id' => $id,
            'name' => 'DUMMY',
            'mail' => 'dummy@mail',
            'age' => 0,
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        Bus::fake();
        MyJob::dispatch($id);

        Bus::assertDispatched(
            MyJob::class,
            function ($job) use ($id) {
                $p = Person::find($id)->first();
                return $job->getPersonId() == $p->id;
            }
        );
    }
}
