<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['role:stuff'])->group(function() {

	Route::get('/schedule/add', 'ScheduleController@add')->name('schedule.add');
	Route::post('/schedule/store', 'ScheduleController@store')->name('schedule.store');
	Route::post('/schedule/update/{schedule}', 'ScheduleController@update')->name('schedule.update');
	Route::get('/schedule/list', 'ScheduleController@list')->name('schedule.list');

});