<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::middleware('auth')->group(function() {

	/****    PATIENT SECTION   ****/
	Route::get('/patient/register', [PatientController::class, 'add'])->name('patient.register');


	Route::get('/add/patient', [PatientController::class, 'addPatient'])->name('patient.add');
	Route::get('/view/patient', [PatientController::class, 'index'])->name('patient.view');
	Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');
	Route::get('/patient/edit/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
	Route::patch('/patient/update/{patient}', [PatientController::class, 'update'])->name('patient.update');
	Route::delete('/patient/delete/{patient}', [PatientController::class, 'delete'])->name('patient.delete');

	Route::get('admin/message/doctor', [PatientController::class, 'message'])->name('admin.message.doctor');
	
});