<?php
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(function() {
	//Floor
	Route::get('admin/floor', 'FloorController@floor')->name('admin.floor');
	Route::post('admin/floor', 'FloorController@store')->name('admin.floor.store');
	Route::put('admin/floor/edit/{floor}', 'FloorController@edit')->name('admin.floor.edit');
	Route::delete('admin/floor/delete/{floor}', 'FloorController@delete')->name('admin.floor.delete');

	// Bed Category
	Route::get('admin/bed/category', 'BedCategoryController@add')->name('admin.bed.category');
	Route::post('admin/bed/category', 'BedCategoryController@store')->name('admin.bed.category.store');
	Route::put('admin/bed/category/{category}/edit', 'BedCategoryController@edit')->name('admin.bed.category.edit');
	Route::delete('admin/bed/category/{category}/delete', 'BedCategoryController@delete')->name('admin.bed.category.delete');

	// Bed
	Route::get('admin/bed/index', 'BedController@index')->name('admin.bed.index');
	Route::post('admin/bed/store', 'BedController@store')->name('admin.bed.store');
	Route::put('admin/bed/update/{bed}', 'BedController@update')->name('admin.bed.update');
	Route::delete('admin/bed/delete/{bed}', 'BedController@delete')->name('admin.bed.delete');
	Route::get('admin/bed/get/{floor}', 'BedController@getBedCat')->name('get.bed');

	// ICU CCU ONLINE REQUEST
		#ICU
	Route::get('admin/bed/online/request', 'IcuCcuController@index')->name('icu.ccu.index');
	Route::get('user/online/request', 'IcuCcuController@form')->name('icu.ccu.form');
	Route::post('user/online/request', 'IcuCcuController@store')->name('icu.ccu.store');
	
		#CCU
	Route::get('user/online/request/ccu', 'IcuCcuController@ccuForm')->name('ccu.form');
	Route::post('user/online/request/ccu', 'IcuCcuController@ccuStore')->name('ccu.store');


	// ICU CCU ONLINE REQUEST Ajax Call


});