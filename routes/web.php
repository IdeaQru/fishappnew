<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoggerController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/api/dashboard', [DashboardController::class, 'indexAPI'])->name('dashboard.api');
Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('edit');
Route::delete('/delete/{id}', [DashboardController::class, 'delete'])->name('delete');
Route::post('/tasks', [DashboardController::class, 'store'])->name('tasks.store');
Route::put('/update/{id}', [DashboardController::class, 'update'])->name('update');

Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/map/data', [MapController::class, 'showMap'])->name('mapdata');
Route::get('/getExpiredData', [LoggerController::class, 'getExpiredData'])->name('filter');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/download', [PDFController::class, 'downloadPDF'])->name('download.pdf');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

