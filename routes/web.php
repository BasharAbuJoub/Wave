<?php

use App\Http\Resources\OverviewCollection;
use App\Hall;
use App\Http\Resources\OverlayCollection;
use App\Device;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'API home page';
});


Route::get('/overview', function(){
    return new OverviewCollection(Hall::all());
});

Route::get('/overlay/all', function(){
    return new OverlayCollection(Device::all());
});