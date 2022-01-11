<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::middleware(['auth', 'role:super-admin'])->group(function() {


	Route::get('/view/doctors', [DoctorController::class, 'index'])->name('doctor.view');
	Route::post('/store/doctors', [DoctorController::class, 'store'])->name('doctor.store');
	Route::patch('/update/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctor.update');
	Route::delete('/delete/doctors/{doctor}', [DoctorController::class, 'delete'])->name('doctor.delete');
});