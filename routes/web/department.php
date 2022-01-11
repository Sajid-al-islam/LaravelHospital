<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

Route::middleware(['auth', 'role:super-admin'])->group(function() {

	Route::get('/admin/departments', [DepartmentController::class, 'index'])->name('department.view');
	Route::post('/admin/department/store', 'DepartmentController@store')->name('department.store');
	Route::post('/admin/department/store/validate', 'DepartmentController@storeValidate')->name('department.store.validate');
	Route::patch('/admin/department/{department}/update', 'DepartmentController@update')->name('department.update');
	Route::delete('/admin/department/{department}/delete', 'DepartmentController@delete')->name('department.delete');

});