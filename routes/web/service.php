<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:super-admin'])->group(function() {
	Route::resource('admin/service', 'ServiceController');
});