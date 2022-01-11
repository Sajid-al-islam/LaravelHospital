<?php
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(function() {

	Route::get('admin/inpatient', 'InPatientController@add')->name('inpatient.add');
	Route::post('admin/inpatient', 'InPatientController@store')->name('inpatient.store');
	Route::get('admin/inpatient/view/list', 'InPatientController@view')->name('inpatient.view');


	Route::get('inpatient/bill', 'BillController@bill')->name('inpatient.bill');

	// Ajax Request Route
	Route::get('admin/inpatient/department/{department}', 'InPatientController@getDept')->name('inpatient.get.dept');
	Route::get('admin/inpatient/{floor}', 'InPatientController@getFloor')->name('inpatient.get.floor');
	Route::get('admin/inpatient/bed/{cat}', 'InPatientController@getCat')->name('inpatient.get.cat');

});