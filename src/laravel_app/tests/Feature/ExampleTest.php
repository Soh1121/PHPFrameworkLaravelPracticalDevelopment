<?php

namespace Tests\Feature;

use App\Person;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $data = [
            'id' => 10,
            'name' => 'DUMMY',
            'mail' => 'dummy@mail',
            'age' => 0,
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        $person->name = 'NOT-DUMMY';
        $person->save();
        $this->assertDatabaseMissing('people', $data);
        $data['name'] = 'NOT-DUMMY';
        $this->assertDatabaseHas('people', $data);

        $person->delete();
        $this->assertDatabaseMissing('person', $data);
    }
}
