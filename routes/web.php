<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\UserController;
use App\Models\Consultation;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\Vue;

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

Auth::routes();


Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/', function () {
        return view('user.home');
    })->name('user-home');
    Route::resource('treatment-user', TreatmentController::class);
    Route::get('detail-treatment/{id}', [TreatmentController::class, 'showDetail'])->name('detail-treatment');
    Route::get('detail/{id}', [TreatmentController::class, 'showDetail']);

    Route::resource('doctor-consul', ConsultController::class);
    Route::get('consult-user/{id}', [ConsultController::class, 'indexUser'])->name('consult-user');

    Route::get('doctor', [DoctorController::class, 'indexUser'])->name('doctor');
    Route::resource('transaction', TransactionController::class);
    Route::resource('order', OrderController::class);
    Route::resource('reservasi', ReservationController::class);
    Route::get('reservasi-user/{id}', [ReservationController::class, 'indexUser'])->name('reservasi-user');
    Route::get('confirm', [TransactionController::class, 'changeConfirmation']);
    Route::post('reschedule-reserv/{id}', [TransactionController::class, 'reschedule'])->name('reschedule-reserv');
    Route::post('reschedule-consult/{id}', [ConsultController::class, 'reschedule'])->name('reschedule-consult');
    Route::get('consult-confirm', [ConsultController::class, 'changeConfirm']);
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('reservasi-ad', [ReservationController::class, 'indexAdmin'])->name('reservasi-ad');
    Route::get('consul-admin', [ConsultController::class, 'indexAdmin'])->name('consul-admin');
    Route::resource('customer', CustomerController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('treatment', TreatmentController::class);
    Route::resource('doctor-list', DoctorController::class);
    Route::get('status', [TransactionController::class, 'changeStatus']);
    Route::get('consult-status', [ConsultController::class, 'changeStatus']);
    // Route::resource('doctor-consul', ConsultController::class);
});

Route::get('/profile/{id}', [UserController::class, 'show']);
Route::get('print-reserv/{id}', [TransactionController::class, 'printReserv'])->name('print-reserv');
Route::get('print-consult/{id}', [ConsultController::class, 'printConsult'])->name('print-consult');
// Route::get('reservasi', function () {
//     return view('user.reservasi');
// });



// Route::resource('reservasi-simpan', UserController::class);

Route::resource('doctor-list', DoctorController::class)->middleware('role:1');
Route::get('unauthorized', function () {
    return view('unauthorized');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
