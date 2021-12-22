<?php

namespace App\Console\Commands;

use App\Person;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class MyCommand extends Command
{
    protected $signature = 'my:cmd {--id=?} {--name=?}';
    protected $description = 'This is my first command!';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->option('id');
        $name = $this->option('name');
        if ($id != '?') {
            $p = Person::find($id);
        } else {
            if ($name != '?') {
                $p = Person::where('name', $name)->first();
            } else {
                $p = null;
            }
        }
        if ($p != null) {
            echo "Person id = " . $p->id . ":\n" . $p->all_data;
        } else {
            echo 'no Person find...';
        }
    }
}
