<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LugarTuristicoController; // <-- 1. AÑADE LA IMPORTACIÓN DE TU CONTROLADOR

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 2. MODIFICA LA RUTA PRINCIPAL PARA REDIRIGIR AL LOGIN
Route::get('/', function () {
    return redirect('/login');
});

// 3. AÑADE LA RUTA PARA TU MÓDULO DE LUGARES
Route::resource('lugares', LugarTuristicoController::class);

// El resto de las rutas que Breeze ya creó están bien
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';