<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CleanTemporaryUploads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean temporary uploads.';

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
        try {
            $file = new Filesystem();
            $file->cleanDirectory(storage_path('app/livewire-tmp'));
            $this->comment('Temporary uploads cleared successfully');
        } catch (Exception $e) {
            $this->error('Error encountered -> ' . $e->getMessage());
            return 0;
        }

        return 1;
    }
}
