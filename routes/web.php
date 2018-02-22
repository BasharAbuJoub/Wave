<?php

Route::get('/' , 'MainController@index');

Route::resource('/devices', 'DeviceController');

Auth::routes();

