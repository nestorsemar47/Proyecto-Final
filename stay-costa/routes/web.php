<?php

use App\Http\Controllers\PropiedadController;
use Illuminate\Support\Facades\Route;

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

