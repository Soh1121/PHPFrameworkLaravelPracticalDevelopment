<?php

namespace Tests\Feature;

use App\Person;
use DatabaseSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->seed(DatabaseSeeder::class);
        $person = Person::find(1);
        $data = $person->toArray(1);

        $this->assertDatabaseHas('people', $data);

        $person->delete();
        $this->assertDatabaseMissing('person', $data);
    }
}
