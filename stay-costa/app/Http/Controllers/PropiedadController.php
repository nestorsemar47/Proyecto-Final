<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedades;

class PropiedadController extends Controller
{
    public function index()
    {
        $propiedades = Propiedades::all();

        return view('home', compact('propiedades'));
    }

    public function show(string $id)
    {
        $propiedad = Propiedades::findOrFail($id);

        return view('propiedades.show', compact('propiedad'));
    }
}
