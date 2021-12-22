<?php

namespace App\Console\Commands;

use App\Person;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class MyCommand extends Command
{
    protected $signature = 'my:cmd';
    protected $description = 'This is my first command!';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $choice = ['id', 'name', 'age'];
        echo "find Person!\n";
        $field = $this->choice("select field:", $choice, 1);
        $value = $this->ask('input value:');

        $p = Person::where($field, $value)->first();

        if ($p != null) {
            echo 'id = ' . $p->id . "\n";
        } else {
            echo "can't find Person.";
        }
    }
}
