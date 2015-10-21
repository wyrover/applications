<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'applications-app:clear-logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears log files on a daily basis.';

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
     * @return mixed
     */
    public function handle()
    {
        $myFile = storage_path() . "/logs/laravel.log";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, "");
        fclose($fh);

        $this->comment('Log file emptied.');
    }
}
