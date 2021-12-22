<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        //
    }
}
