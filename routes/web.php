<?php

Route::get('/' , 'MainController@index');

Route::resource('/devices', 'DeviceController');

Route::resource('/lectures', 'LectureController');

Route::resource('/announcements', 'AnnouncementController');

Route::get('/logout', function(){
    Auth::logout();
    return response()->redirectTo('/');
})->name('logout');



Auth::routes();