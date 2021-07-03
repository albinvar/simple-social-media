<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class dummyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates dummy posts.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('db:seed', ['--class' => 'DummyDataSeeder']);
    }
}
