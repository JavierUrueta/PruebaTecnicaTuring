<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\StaffController;

// Rutas Staff
Route::prefix('staff')->group(function () {
    Route::get('/login', [StaffController::class, 'showLoginForm'])->name('staff.login');
    Route::post('/login', [StaffController::class, 'login']);
    Route::post('/logout', [StaffController::class, 'logout'])->name('staff.logout');
});

// Rutas protegidas por middleware para Staff y Directores
Route::middleware(['auth:staff,director'])->group(function () {
    Route::get('/dashboard', [DirectorController::class, 'index'])->name('dashboard');
});

// Rutas para alumnos
Route::middleware('auth:director')->prefix('director')->name('director.')->group(function () {
    Route::post('director/alumnos', [AlumnoController::class, 'store'])->name('alumno.store');
    
});

// Rutas del recurso 'alumnos', excluyendo 'store' y 'update'
Route::resource('alumnos', AlumnoController::class)->except(['store', 'update']);



// Rutas para el director (solo accesibles por directores autenticados)
Route::middleware('auth:director')->prefix('director')->name('director.')->group(function () {
    Route::get('/dashboard', [DirectorController::class, 'index'])->name('dashboard');
    Route::get('/students', [DirectorController::class, 'students'])->name('students');
    Route::put('/students/{id}', [AlumnoController::class, 'update'])->name('students.update');
    
});

// Rutas generales para usuarios autenticados y verificados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DirectorController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta inicial (bienvenida)
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
require __DIR__.'/auth.php';
