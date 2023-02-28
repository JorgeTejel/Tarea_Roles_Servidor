<?php

use App\Http\Controllers\ProfileController;
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
Route::resource("clientes", \App\Http\Controllers\ClienteController::class);
Route::resource("facturas", \App\Http\Controllers\FacturaController::class);
Route::resource("empleados", \App\Http\Controllers\EmpleadoController::class);


Route::get('/', function () {
    return view('acceso');
})->name("main");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource("clientes", \App\Http\Controllers\ClienteController::class);
    Route::resource("facturas", \App\Http\Controllers\FacturaController::class);
    Route::resource("empleados", \App\Http\Controllers\EmpleadoController::class);
    Route::resource("idiomas", \App\Http\Controllers\IdiomaController::class);
    Route::get('/', function () {
        return view('acceso');
    })->name("main");
});

require __DIR__.'/auth.php';
