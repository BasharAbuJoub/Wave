<?php

namespace App\Http\Controllers\API;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OverlayCollection;
use App\Hall;
use App\Http\Resources\Overlay;
use App\Device;
use App\Http\Resources\OverviewCollection;
use App\Http\Resources\LectureResource;
use App\Lecture;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use function GuzzleHttp\Promise\unwrap;
use function GuzzleHttp\Promise\settle;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Pool;


class ApiController extends Controller
{
    //


    public function overview()
    {
        return new OverviewCollection(Hall::all());
    }

    public function overlay($id)
    {
        return new Overlay(Device::find($id));
    }

    public function overlays()
    {
        return new OverlayCollection(Device::all());
    }

    public function lectures()
    {
        $lectures = Lecture::all();
        return LectureResource::collection($lectures);
    }

    public function online()
    {  
        $online = [];

        $client = new Client(['timeout' => 1]);
        $devices = Device::all();
        foreach($devices as $device){
            try{
                $client->get('http://' . $device->ip);
                $online[] = $device->id;
            }catch(ConnectException $e){

            }
        }

        return ['online' => $online];
        
    }

}
