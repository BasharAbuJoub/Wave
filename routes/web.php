<?php

Route::get('/' , 'MainController@index');

Route::resource('/devices', 'DeviceController');


Route::get('/logout', function(){
    Auth::logout();
    return response()->redirectTo('/');
})->name('logout');

Auth::routes();

