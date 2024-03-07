<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ProfileController;
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
Route::get('/', [EventController::class, 'index']);

Route::resources([
    'categories' => CategoryController::class,
    'events' => EventController::class,
]);
Route::post('/events/search', [EventController::class, 'search'])->name('events.search');


Route::patch('/admin/events/accept/{event}', [AdminController::class, 'accept'])->name('admin.events.accept');
Route::patch('/admin/events/reject/{event}', [AdminController::class, 'reject'])->name('admin.events.reject');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/events', [AdminController::class, 'events']);
Route::get('/organizer/events', [OrganizerController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
