<?php

namespace Tests\Feature;

use App\MyClasses\PowerMyService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $msg = '*** OK ***';
        $mock = Mockery::mock(PowerMyService::class);
        $mock->shouldReceive('setId')
            ->withArgs([1])
            ->once()
            ->andReturn(null);

        $mock->shouldReceive('say')
            ->once()
            ->andReturn($msg);

        $this->instance(PowerMyService::class, $mock);

        $response = $this->get('/hello');
        $content = $response->getContent();
        $response->asertSeeText($msg, $content);
    }
}
