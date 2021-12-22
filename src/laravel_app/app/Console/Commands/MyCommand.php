<?php

namespace App\Console\Commands;

use App\Person;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class MyCommand extends Command
{
    protected $signature = 'my:cmd {num?*}';
    protected $description = 'This is my first command!';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $arr = $this->arguments();
        $re = 0;
        foreach ($arr['num'] as $item) {
            $re += (int)$item;
        }
        echo "total: " . $re;
    }
}
