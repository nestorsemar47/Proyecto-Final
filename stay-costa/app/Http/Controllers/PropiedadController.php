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

    public function adminIndex()
    {
        $propiedades = Propiedades::latest()->get();
        return view('admin.propiedades.index', compact('propiedades'));
    }

    public function create()
    {
        return view('admin.propiedades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'required|string',
            'ubicacion'     => 'required|string|max:255',
            'precio_noche'  => 'required|numeric|min:0',
            'habitaciones'  => 'required|integer|min:1',
            'imagen_url'    => 'required|url',
        ]);

        Propiedades::create([
            'titulo'        => $request->titulo,
            'descripcion'   => $request->descripcion,
            'ubicacion'     => $request->ubicacion,
            'precio_noche'  => $request->precio_noche,
            'habitaciones'  => $request->habitaciones,
            'imagen_url'    => $request->imagen_url,
        ]);

        return redirect()->route('admin.propiedades.index')
            ->with('exito', '¡La propiedad se ha publicado correctamente en la plataforma!');
    }
}
