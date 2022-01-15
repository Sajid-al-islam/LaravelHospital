<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;

Route::middleware(['auth', 'role:super-admin'])->group(function() {

	Route::get('/finance', [FinanceController::class, 'index'])->name('finance');
	Route::get('/add/bill', [FinanceController::class, 'create'])->name('finance.add');
	Route::post('/store/bill', [FinanceController::class, 'store'])->name('finance.store');
	Route::post('finance/invoice', [FinanceController::class, 'invoice'])->name('finance.invoice');
	Route::patch('/update/bill/{bill}', [FinanceController::class, 'edit'])->name('finance.edit');
	Route::patch('/update/bill/{bill}', [FinanceController::class, 'update'])->name('finance.update');
	Route::delete('/delete/bill/{bill}', [FinanceController::class, 'delete'])->name('finance.delete');

	// Route::get('/get-patient-data/{patient_id}', [FinanceController::class, 'get_data'])->name('finance.get_data');
	//PDF//
	Route::get('/admin/bill/download', 'FinanceController@download_view')->name('bill.download');

});