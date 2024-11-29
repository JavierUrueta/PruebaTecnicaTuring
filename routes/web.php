<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;
use Spatie\Permission\Models\Role;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:director'])->get('/directors', [DirectorController::class, 'index']);

Route::middleware(['auth', 'role:director'])->group(function () {
    // Ruta para la vista de los directores
    Route::get('directors', [DirectorController::class, 'index'])->name('directors.index');
});


require __DIR__.'/auth.php';
