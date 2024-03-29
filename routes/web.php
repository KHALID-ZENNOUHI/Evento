<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/ticket', function () {
//     return view('events.ticket');
// });

Route::get('/', [EventController::class, 'index']);
Route::get('/home', [EventController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/reservations/yours', [ReservationController::class, 'yourReservations']);

Route::middleware('role:admin')->group(function (){
    Route::resources(['categories' => CategoryController::class]);
});

Route::middleware('role:organizer')->group(function (){
    Route::resources(['events' => EventController::class]);
    Route::get('events/{event}', [EventController::class, 'show'])->withoutMiddleware('role:organizer');
});
Route::patch('/reservations/accept/{reservation}', [ReservationController::class, 'accept'])->middleware('role:organizer');
Route::patch('/reservations/reject/{reservation}', [ReservationController::class, 'reject'])->middleware('role:organizer');

Route::post('/events/search', [EventController::class, 'search'])->name('events.search');
Route::patch('/reservations/{event}', [ReservationController::class, 'reservation'])->name('reservations')->middleware('role:user');


Route::patch('/dashboard/events/accept/{event}', [AdminController::class, 'accept'])->name('admin.events.accept')->middleware('role:admin');
Route::patch('/dashboard/events/reject/{event}', [AdminController::class, 'reject'])->name('admin.events.reject')->middleware('role:admin');
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('role:admin');
Route::get('/dashboard/events', [AdminController::class, 'events'])->middleware('role:admin');


Route::get('/organizer/events', [OrganizerController::class, 'index'])->middleware('role:organizer');
Route::get('/organizer/reservations', [ReservationController::class, 'showReservation'])->middleware('role:organizer');
Route::patch('/reservations/{event}', [ReservationController::class, 'reservation'])->name('reservations')->middleware('role:user');
Route::post('/booking/{event}',[ReservationController::class, 'reservation'])->middleware('role:user');
Route::post('/payment/{event}',[ReservationController::class, 'payment'])->middleware('role:user');
Route::post('/booking/ticket/{event}',[ReservationController::class, 'downloadTickets'])->middleware('role:user');
Route::get('/success',[ReservationController::class, 'success'])->middleware('role:user');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
