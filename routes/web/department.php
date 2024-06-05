<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

Route::middleware(['role:super-admin'])->group(function() {

	Route::get('/super-admin/departments', [DepartmentController::class, 'index'])->name('department.view');
	Route::post('/super-admin/department/store', 'DepartmentController@store')->name('department.store');
	Route::post('/super-admin/department/store/validate', 'DepartmentController@storeValidate')->name('department.store.validate');
	Route::patch('/super-admin/department/{department}/update', 'DepartmentController@update')->name('department.update');
	Route::delete('/super-admin/department/{department}/delete', 'DepartmentController@delete')->name('department.delete');

});