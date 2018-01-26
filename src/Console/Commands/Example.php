<?php

//namespace App\Console\Commands;

namespace jafo232\ambientapi\Console\Commands;

use Illuminate\Console\Command;

class Example extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test_ambient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test configuration';

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
        $devices = \Ambient::getDevices();

        //  You have to sleep or you get a 429 error for too many requests
        sleep(2);

        foreach ($devices as $device)
		{
			echo "\n\nDisplaying last data for device $device[macAddress]:\n\n";

			print_r(\Ambient::getDeviceData($device['macAddress'], 5));

			sleep(2);
		}

		echo "\n\nTest Completed.\n\n";
    }
}
