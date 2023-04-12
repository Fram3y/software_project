<?php

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\User\MovieController as UserMovieController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('movies');
})->middleware(['auth', 'verified'])->name('dashboard');

// Home Controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.movies.index');

Route::get('/home/orders', [App\Http\Controllers\HomeController::class, 'ordersIndex'])->name('home.orders.index');

// Admin Controller
Route::resource('/admin/movies', AdminMovieController::class)->middleware(['auth'])->names('admin.movies');

Route::resource('/admin/orders', AdminOrderController::class)->middleware(['auth'])->names('admin.orders');

// User Controller
Route::resource('/user/movies', UserMovieController::class)->middleware(['auth'])->names('user.movies');

Route::resource('/user/orders', UserOrderController::class)->middleware(['auth'])->names('user.orders');


Auth::routes();
