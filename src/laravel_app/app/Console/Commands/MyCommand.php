<?php

namespace App\Console\Commands;

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
        echo "\n*今日の格言*\n\n";
        echo Inspiring::quote();
        echo "\n\n";
    }
}
