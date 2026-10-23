<?php

use App\Http\Controllers\PropiedadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registro', [AuthController::class, 'showRegister'])->name('register');
Route::post('/registro', [AuthController::class, 'register'])->name('register.post');

Route::get('/', [PropiedadController::class, 'index'])->name('home');

Route::get('/propiedades', [PropiedadController::class, 'propiedadesIndex'])->name('propiedades.index');

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/propiedades/{id}', [PropiedadController::class, 'show'])->name('propiedades.show');

Route::get('/buscar-propiedades', [PropiedadController::class, 'buscar'])->name('propiedades.buscar');

Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

Route::get('/mis-reservas', [ReservaController::class, 'misReservas'])->name('reservas.mis_reservas');

Route::middleware(['auth', 'es_admin'])->prefix('admin')->group(function () {

    Route::get('/propiedades', [PropiedadController::class, 'adminIndex'])->name('admin.propiedades.index');

    Route::get('/propiedades/crear', [PropiedadController::class, 'create'])->name('admin.propiedades.create');

    Route::post('/propiedades', [PropiedadController::class, 'store'])->name('admin.propiedades.store');
});
