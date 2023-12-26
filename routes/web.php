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

Auth::routes();

Route::get('/', [IndexController::class, 'redirects'])->name('index');
Route::get('/home', [IndexController::class, 'redirects'])->name('home');

Route::middleware(['auth', 'user.access'])->group(function () {
    Route::get('/{user}', [ReservationController::class, 'index'])->name('index');
    Route::get('/{user}/home', [ReservationController::class, 'index'])->name('home.index');
    Route::get('/{user}/home/create', [ReservationController::class, 'create'])->name('home.create');
    Route::post('/home/store', [ReservationController::class, 'store'])->name('home.store');
    Route::get('/{user}/home/edit/{reservation}', [ReservationController::class, 'edit'])->name('home.edit');
    Route::put('/{user}/home/update/{reservation}', [ReservationController::class, 'update'])->name('home.update');
    Route::get('/{user}/home/destroy/{reservation}', [ReservationController::class, 'destroy'])->name('home.destroy');
    Route::delete('/{user}/home/destroy/{reservation}', [ReservationController::class, 'destroy'])->name('home.destroy');
});

//Admin
Route::middleware(['auth', 'admin.access'])->group(function () {
    Route::get('/{user}/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/{user}/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/{user}/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{user}/admin/edit/{reservation}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{user}/admin/update/{reservation}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/{user}/admin/destroy/{reservation}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::delete('/{user}/admin/destroy/{reservation}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
