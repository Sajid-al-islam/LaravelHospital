<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('auth')->group(function() {

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

/****    APPOINTMENT SECTION   ****/
Route::resource('appointment', 'AppointmentController');
Route::get('admin/appointment/list', [AdminController::class, 'list'])->name('admin.list');



/****    PROFILE SECTION   ****/
Route::get('/user/{user}/profile', 'UserController@profile')->name('user.profile');
Route::patch('/user/{user}/profile/update', 'UserController@update')->name('user.update');
Route::patch('/user/{user}/profile/update/password', 'UserController@updatePassword')->name('user.update.password');
Route::patch('/user/{user}/profile/update/photo', 'UserController@updatePhoto')->name('user.update.photo');

/***********	Doctor bed patient Route	***************/
Route::get('doctor/bed/patient', 'InPatientController@doctorView')->name('doctor.bed.patient');
Route::get('doctor/bed/details/{patient}', 'InPatientController@doctorDetails')->name('doctor.bed.details');
Route::get('patient/details/download/{patient}', 'InPatientController@detailsDownload')->name('patient.details.download');
Route::get('patient/download/{patient}', 'InPatientController@try')->name('patient.download');

/****    ATTENDANCE SECTION   ****/
Route::post('attendance/store', 'AttendanceController@store')->name('attendance.store');
Route::get('attendance/doctor/list', 'AttendanceController@docList')->name('attendance.doctor.list');
Route::get('attendance/staff/list', 'AttendanceController@staffList')->name('attendance.staff.list');
});

/****    ATTENDANCE Schedule SECTION   ****/

Route::get('/attendance/schedule', 'AttendanceController@schedule')->name('attendance.schedule');
Route::post('/attendance/schedule', 'AttendanceController@scheduleStore')->name('attendance.schedule.store');
Route::get('/attendance/schedule/role/{role}', 'AttendanceController@schedule')->name('get.schedule.role');

/***********************////////


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [UIController::class, 'index'])->name('home.index');

// APPOINTMENT RELATED ROUTE
Route::get('/appointment', [AppointmentController::class, 'appointment'])->name('appointment.add');
Route::post('/appointment', [AppointmentController::class, 'appointment_store'])->name('appointment.store');
Route::get('get_department/{department}', [AppointmentController::class, 'get_department'])->name('get_department');
Route::get('get/doctor/schedule/{doctor}', [AppointmentController::class, 'get_doctor'])->name('get_doctor');

Route::get('/search/appointment/{doctor}', [AppointmentController::class, 'appointmentSearch'])->name('appointment.search');

// User Interface Route
Route::get('ui/department/view', 'Frontend\UiDepartmentController@index')->name('ui.department');
Route::get('ui/doctor/view', 'Frontend\UiDoctorController@index')->name('ui.doctor');

// Live Chat
Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');


// Stripe Payment
Route::get('stripe/{service}', [StripeController::class, 'stripe'])->name('stripe.get');
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

// Service Book
Route::get('service/{service}/book', 'ServiceController@book')->name('service.book');

// Search route
Route::get('search', 'SearchController@search')->name('search');
Route::get('search/doctor', 'SearchController@searchDoctor')->name('search.doctor');
Route::get('search/department', 'SearchController@searchDepartment')->name('search.department');




