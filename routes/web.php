<?php

Route::get('/' , 'MainController@index')->name('home');

Route::resource('/devices', 'DeviceController');

Route::resource('/lectures', 'LectureController');

Route::get('/lobby', 'MainControlller@lobby')->name('lobby');

Route::get('/announcements/create/{lecture}', 'AnnouncementController@create')->name('announcements.create.lecture');
Route::resource('/announcements', 'AnnouncementController');

Route::get('/logout', function(){
    Auth::logout();
    return response()->redirectTo('/');
})->name('logout');



Auth::routes();