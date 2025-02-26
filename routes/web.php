<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LaboratoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// SYSTEM START
Route::get('/', [DashboardController::class, 'Welcome'])->name('Welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // initial DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
    Route::prefix('modulo')->group(function () {
        // DOCTOR
        Route::resource('doctor', DoctorController::class)->except(['create']);

        // path/route to list
        Route::get('doctors/list', [DoctorController::class, 'listDoctor'])->name('doctor.list');
    });
});
Route::get('doctors/search', [DoctorController::class, 'searchDoctor'])->name('doctor.search');


//Routes for laboratory
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Initial Route
    
    Route::prefix('modulo')->group(function () {
        // Laboratories
        Route::resource('laboratories', LaboratoryController::class)->except(['create']);
        // Aditional route for list
        Route::get('laboratories/list', [LaboratoryController::class, 'listLaboratory'])->name('laboratory.list');
    });
});

// Search Route 
Route::get('laboratories/search', [LaboratoryController::class, 'searchLaboratory'])->name('laboratory.search');
