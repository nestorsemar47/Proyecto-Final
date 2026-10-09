<?php

use App\Http\Controllers\PropiedadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [PropiedadController::class, 'index'])->name('home');

Route::get('/propiedades', function () {
    return view('propiedades');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/propiedades/{id}', [PropiedadController::class, 'show'])->name('propiedades.show');

Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
