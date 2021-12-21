<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/hello')->assertOk();
        // $this->post('/hello')->assertOk();
        $this->get('/hello/1')->assertOk();
        $this->get('/hoge')->assertStatus(404);
        $this->get('/hello')->assertSeeText('Index');
        $this->get('/hello')->assertSee('<h1>');
        $this->get('/hello')->assertSeeInOrder(['<html', '<head', '<body', '<h1>']);
        $this->get('/hello/json/1')->assertSeeText('TARO');
        // $this->get('/hello/json/2')->assertExactJson(
        //     [
        //         'id' => 2, 'name' => 'HANAKO [+MYJOB]',
        //         'mail' => 'hanako@flower.jp', 'age' => 34, 'created_at' => null,
        //         'updated_ad' => '2021-12-20 06:14:56'
        //     ]
        // );
    }
}
