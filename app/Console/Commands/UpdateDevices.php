<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Device;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use App\Http\Resources\Overlay;
use App\Helpers\DeviceOverlay;

class UpdateDevices extends Command
{
    protected $signature = 'updatedevices';

    protected $description = 'Update all devices with the new data.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {



        $devices = Device::all();

        $skipped = [];

        $client = new Client(['timeout' => 1]);

        foreach ($devices as $key => $device) {
            $overlay = new DeviceOverlay($device);

            try{
            
                $client->get('http://' . $device->ip . '/display?l=0&m=' . $overlay->title);
                $client->get('http://' . $device->ip . '/displaysmall?l=2&m=' . $overlay->line1);
                $client->get('http://' . $device->ip . '/displaysmall?l=3&m=' . $overlay->line1);

                $device->update([
                    'last_seen' => Carbon::now(),
                ]);

            }catch(\Exception $e){
                $skipped[] = $device;
            }

        }


        echo "Skipped : " . implode(', ' , array_pluck($skipped, 'room')); 

    }
}
