<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LugarTuristicoController; // <-- La línea que importaste

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

// La línea que añadiste al final
Route::resource('lugares', LugarTuristicoController::class);