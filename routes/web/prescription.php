<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;

Route::middleware(['role:doctor','role:patient'])->group(function() {

	Route::get('doctor/prescription', [PrescriptionController::class, 'prescription'])->name('doctor.prescription');
	Route::post('/prescription/store', [PrescriptionController::class, 'store'])->name('prescription.store');
	Route::get('/view/{prescription}', [PrescriptionController::class, 'view'])->name('view.prescription');
	Route::get('/prescription/view/list', [PrescriptionController::class, 'list'])->name('view.prescription.list');
	Route::delete('/prescription/{prescription}/delete', [PrescriptionController::class, 'delete'])->name('prescription.delete');

	Route::get('/view/{prescription}/download', [PrescriptionController::class, 'download_view'])->name('prescription.download');
	Route::get('/view/{prescription}/try', [PrescriptionController::class, 'try'])->name('prescription.try');

});