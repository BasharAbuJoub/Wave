<?php

Route::get('/' , 'MainController@index');

Route::resource('/devices', 'DeviceController');

Route::resource('/lectures', 'LectureController');

Route::get('/announcements/create/{lecture}', 'AnnouncementController@create')->name('announcements.create.lecture');
Route::resource('/announcements', 'AnnouncementController');

Route::get('/logout', function(){
    Auth::logout();
    return response()->redirectTo('/');
})->name('logout');



Auth::routes();