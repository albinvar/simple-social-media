<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Does all necessary tasks';

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
        $this->newline();
        $this->comment('Setting Up Database');
        $this->call('migrate:fresh', ['--seed' => true]);
        $this->newline();
        $this->comment('Setting Up Storage');
        try {
            $this->callSilently('storage:link');
        } catch (Exception $e) {
            $this->newline();
            $this->error('Error encountered');
        }
    }
}
