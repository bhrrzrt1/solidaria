<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// INICIO DEL SISTEMA
Route::get('/', [DashboardController::class, 'Welcome'])->name('Welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // DASHBOARD inicial
    Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
    Route::prefix('modulo')->group(function () {
        // DOCTOR
        Route::resource('doctor', DoctorController::class)->except(['create']);
        // ruta para listar
        Route::get('doctors/list', [DoctorController::class, 'listDoctor'])->name('doctor.list');
    });
});
Route::get('doctors/search', [DoctorController::class, 'searchDoctor'])->name('doctor.search');
