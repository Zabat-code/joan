<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});


  Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});
    Route::get('/users', [DashboardController::class, 'index'])->name('users');
    Route::get('/products', [DashboardController::class, 'index'])->name('products');
    Route::get('/orders', [DashboardController::class, 'index'])->name('orders');
    Route::get('/reports', [DashboardController::class, 'index'])->name('reports');
    Route::get('/settings', [DashboardController::class, 'index'])->name('settings');
    Route::get('/logout', [DashboardController::class, 'index'])->name('logout');
    Route::get('/profile', [DashboardController::class, 'index'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'index'])->name('settings');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
