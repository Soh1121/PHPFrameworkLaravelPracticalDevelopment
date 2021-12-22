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
        $this->question("find Person!");
        $field = $this->choice("select field:", $choice, 1);
        $value = $this->ask('input value:');

        $p = Person::where($field, $value)->first();

        if ($p != null) {
            $this->info('id = ' . $p->id);
            $this->line($p->all_data);
        } else {
            $this->error("can't find Person.");
        }
    }
}
