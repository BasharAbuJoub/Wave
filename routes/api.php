<?php

use Illuminate\Http\Request;
use App\Device;
use App\Office;
use App\Hall;
use App\Broadcast;
use App\Http\Resources\DeviceResource;
use App\Http\Resources\HallResource;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\BroadcastResourse;
use App\Http\Resources\Overlay;
use App\Http\Resources\UserResourse;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/overlay/{ip}', function($ip){
    return new Overlay(Device::where('ip', $ip)->firstOrFail());
});

Route::get('/overview', 'API\ApiController@overview');
Route::get('/overlays', function(){
    return Overlay::collection(Device::all());
});
Route::get('/devices/status', 'API\ApiController@online');

Route::get('/broadcasts', function(){
    return BroadcastResourse::collection(Broadcast::all());
})->name('api.broadcasts');

Route::get('/users', function(){
    return UserResourse::collection(User::all());
});

Route::get('/halls', function(){
    return HallResource::collection(Hall::all());
});

Route::get('/offices', function(){
    return OfficeResource::collection(Office::all());
});

Route::get('/devices', function(){
    return DeviceResource::collection(Device::all());
});

Route::get('/lectures', 'API\ApiController@lectures')->name('api.lectures');