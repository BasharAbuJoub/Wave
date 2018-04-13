<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Device;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use App\Settings;

class UpdateSpeed extends Command
{
    protected $signature = 'updatespeed';

    protected $description = 'Update the devices speed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
    
        $devices = Device::all();

        $skipped = [];

        $client = new Client(['timeout' => 1]);

        $speed = Settings::key('scroll_speed', 850);

        foreach ($devices as $key => $device) {
            try{
                $client->get('http://' . $device->ip . '/speed?s=' . $speed);
            }catch(\Exception $e){
                $skipped[] = $device;
            }
        }

        echo "Skipped : " . implode(', ' , array_pluck($skipped, 'room')); 


    }
}
