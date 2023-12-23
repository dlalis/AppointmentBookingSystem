<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
});
