<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.init');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    Route::prefix('forms')->group(function () {
        Route::get('/', [FormsController::class, 'index'])->name('forms');
        Route::get('/create', [FormsController::class, 'create'])->name('forms.create');
        Route::get('/builder', [FormsController::class, 'builder'])->name('forms.builder');
        Route::post('/builder', [FormsController::class, 'storeBuilder'])->name('forms.builder.store');
        Route::get('/list', [FormsController::class, 'list'])->name('forms.list');
        // Formulario dinámico: mostrar y guardar respuestas
        Route::get('/dynamic/{id}', [FormsController::class, 'dynamic'])->name('forms.dynamic');
        Route::post('/dynamic/{id}', [FormsController::class, 'storeDynamic'])->name('forms.dynamic.store');
    });

    Route::get('/logout', [DashboardController::class, 'index'])->name('logout');
    Route::get('/profile', [DashboardController::class, 'index'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'index'])->name('settings');
});
