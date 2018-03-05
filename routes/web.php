<?php

Route::get('/' , 'MainController@index')->name('home');

Route::prefix('/profile')->middleware('auth')->group(function(){
    Route::get('/', 'ProfileController@edit');

    Route::put('/', 'ProfileController@update');
});

Route::resource('/devices', 'DeviceController');

Route::resource('/lectures', 'LectureController');

Route::resource('/broadcasts', 'BroadcastController');

Route::resource('/settings', 'SettingsController');

Route::post('/settings/save', 'SettingsController@save');

Route::get('/lobby', 'MainController@lobby')->name('lobby');

Route::get('/announcements/create/{lecture}', 'AnnouncementController@create')->name('announcements.create.lecture');
Route::resource('/announcements', 'AnnouncementController');

Route::get('/logout', function(){
    Auth::logout();
    return response()->redirectTo('/');
})->name('logout');



Auth::routes();