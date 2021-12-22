<?php

namespace App\Console\Commands;

use App\Person;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class MyCommand extends Command
{
    protected $signature = 'my:cmd {person?}';
    protected $description = 'This is my first command!';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $p = $this->argument('person');
        if ($p != null) {
            $person = Person::find($p);
            if ($person != null) {
                echo "\nPerson id = " . $p . ":\n";
                echo $person->all_data . "\n";
                return;
            }
        }
        echo "can't get Person...";
    }
}
