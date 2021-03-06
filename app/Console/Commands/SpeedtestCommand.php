<?php

namespace App\Console\Commands;

use App\Helpers\SpeedtestHelper;
use Illuminate\Console\Command;

class SpeedtestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedtest:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Performs a new speedtest';

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
        $this->info('Running speedtest, this might take a while...');

        $results = SpeedtestHelper::runSpeedtest();

        $this->info('Ping: ' . $results->ping . ' ms');
        $this->info('Download: ' . $results->download . ' Mbit/s');
        $this->info('Upload: ' . $results->upload . ' Mbit/s');
    }
}
