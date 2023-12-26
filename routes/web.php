<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationCreateController;

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

//Route::get('/', function () { return view('index'); } );

Auth::routes();

Route::get('/home', [IndexController::class, 'redirects'])->name('home');
Route::get('/', [IndexController::class, 'redirects'])->name('index');
Route::get('/{user}', [ReservationController::class, 'index'])->name('index');

//option 1
Route::get('/{user}/home', [ReservationController::class, 'index'])->name('index');
Route::get('/{user}/home/create', [ReservationController::class, 'create'])->name('home.create');
Route::post('/home/store', [ReservationController::class, 'store'])->name('home.store');
//Route::get('/home/store', [ReservationController::class, 'store'])->name('home.store');
Route::get('/{user}/home/storeReservation', [ReservationController::class, 'storeReservation'])->name('/{user}/home.storeReservation');

//Route::get('/{user}/home/edit', [ReservationController::class, 'edit'])->name('home.edit');
Route::get('/{user}/home/edit/{reservation}', [ReservationController::class, 'edit'])->name('home.edit');
Route::put('/{user}/home/update/{reservation}', [ReservationController::class, 'update'])->name('home.update');

Route::get('/{user}/home/destroy/{reservation}', [ReservationController::class, 'destroy'])->name('home.destroy');
Route::delete('/{user}/home/destroy/{reservation}', [ReservationController::class, 'destroy'])->name('home.destroy');

/* Option 2
Route::middleware(['auth', 'home'])->name('home.')->prefix('home')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [ReservationController::class, 'create'])->name('create');
    Route::get('/store', [ReservationController::class, 'store'])->name('store');
    Route::get('/storeReservation', [ReservationController::class, 'storeReservation'])->name('storeReservation');
//    Route::resource('/create', ReservationCreateController::class);
});
*/

//Admin
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('/reservations', AdminReservationController::class);
});
