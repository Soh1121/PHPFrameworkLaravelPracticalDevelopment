<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $response = $this->get('/hello');
        $content = $response->getContent();
        echo $content;
        $response->assertSeeText(
            'あなたが好きなのは、1番のリンゴですね！',
            $content
        );
    }
}
