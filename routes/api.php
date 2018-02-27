<?php

use Illuminate\Http\Request;
use App\Device;
use App\Office;
use App\Hall;
use App\Http\Resources\DeviceResource;
use App\Http\Resources\HallResource;
use App\Http\Resources\OfficeResource;

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


Route::get('/overview', 'API\ApiController@overview');

Route::get('/devices/status', function(){
    return ['online' => [1,2,3,4], 'offline' => [5,6,7]];
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