<?php

use App\Http\Resources\LectureResource;
use App\Mail\AncCreated;


// Single Use Actions
Route::view('/users', 'user.index')->middleware('admin');

Route::get('/' , 'MainController@index')->name('home');

Route::prefix('/profile')->middleware('auth')->group(function(){
    Route::get('/', 'ProfileController@edit')->name('profile');

    Route::put('/', 'ProfileController@update');
});

Route::get('/lobby', 'MainController@lobby')->name('lobby');

Route::get('/feeder', 'FeederController@index')->name('feeder.index');

Route::get('/feeder/feed', 'FeederController@feed')->name('feeder.feed');

Route::get('/home', function(){
    return response()->redirectTo('/');
});

Route::post('/settings/save', 'SettingsController@save');

// Resources

Route::resource('/devices', 'DeviceController');

Route::resource('/lectures', 'LectureController');

Route::get('/mylectures', 'LectureController@myLectures')->name('my.lectures');

Route::get('/api/mylectures', 'LectureController@myLecturesJson');

Route::resource('/broadcasts', 'BroadcastController');

Route::resource('/settings', 'SettingsController');

Route::get('/announcements/create/{lecture}', 'AnnouncementController@create')->name('announcements.create.lecture');

Route::resource('/announcements', 'AnnouncementController');

Route::get('/logout', function(){
    Auth::logout();
    return response()->redirectTo('/');
})->name('logout');

//Users
Auth::routes();


Route::get('/changepassword', 'Auth\ChangePasswordController@index')->name('changepassword.index');
Route::put('/changepassword', 'Auth\ChangePasswordController@change');