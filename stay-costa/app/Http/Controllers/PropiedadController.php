<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedades;
use App\Models\Reserva;

class PropiedadController extends Controller
{
    public function index()
    {
        $propiedades = Propiedades::activas()->latest()->take(3)->get();
        return view('home', compact('propiedades'));
    }

    public function propiedadesIndex()
    {
        $propiedades = Propiedades::activas()->latest()->get();
        return view('propiedades.index', compact('propiedades'));
    }

    public function show(string $id)
    {
        // Una propiedad desactivada deja de existir para el sitio público.
        $propiedad = Propiedades::activas()->findOrFail($id);

        $fechasOcupadas = Reserva::where('propiedad_id', $id)
            ->where('fecha_fin', '>=', now()->toDateString())
            ->get(['fecha_inicio', 'fecha_fin'])
            ->map(function ($reserva) {
                return [
                    'from' => $reserva->fecha_inicio,
                    'to'   => $reserva->fecha_fin,
                ];
            });

        return view('propiedades.show', compact('propiedad', 'fechasOcupadas'));
    }

    public function adminIndex()
    {
        // El panel muestra todas, incluidas las desactivadas (borrado lógico).
        $propiedades = Propiedades::latest()->get();
        return view('admin.propiedades.index', compact('propiedades'));
    }

    public function create()
    {
        return view('admin.propiedades.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->reglasValidacion());

        Propiedades::create([
            'titulo'        => $request->titulo,
            'descripcion'   => $request->descripcion,
            'ubicacion'     => $request->ubicacion,
            'precio_noche'  => $request->precio_noche,
            'habitaciones'  => $request->habitaciones,
            'imagen_url'    => $request->imagen_url,
            'activo'        => true,
        ]);

        return redirect()->route('admin.propiedades.index')
            ->with('exito', '¡La propiedad se ha publicado correctamente en la plataforma!');
    }

    public function edit(string $id)
    {
        $propiedad = Propiedades::findOrFail($id);
        return view('admin.propiedades.edit', compact('propiedad'));
    }

    public function update(Request $request, string $id)
    {
        $propiedad = Propiedades::findOrFail($id);

        $request->validate($this->reglasValidacion());

        $propiedad->update([
            'titulo'        => $request->titulo,
            'descripcion'   => $request->descripcion,
            'ubicacion'     => $request->ubicacion,
            'precio_noche'  => $request->precio_noche,
            'habitaciones'  => $request->habitaciones,
            'imagen_url'    => $request->imagen_url,
        ]);

        return redirect()->route('admin.propiedades.index')
            ->with('exito', '¡La propiedad se ha actualizado correctamente!');
    }

    /**
     * Borrado lógico: la propiedad se conserva en la base de datos
     * pero deja de mostrarse en el sitio público.
     */
    public function destroy(string $id)
    {
        $propiedad = Propiedades::findOrFail($id);
        $propiedad->update(['activo' => false]);

        return redirect()->route('admin.propiedades.index')
            ->with('exito', 'La propiedad se ha desactivado y ya no se muestra en el catálogo.');
    }

    /**
     * Reactiva una propiedad previamente desactivada.
     */
    public function activar(string $id)
    {
        $propiedad = Propiedades::findOrFail($id);
        $propiedad->update(['activo' => true]);

        return redirect()->route('admin.propiedades.index')
            ->with('exito', 'La propiedad se ha reactivado y vuelve a mostrarse en el catálogo.');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');

        // Solo se buscan propiedades activas. El orWhere va agrupado para que
        // no escape la condición de activo.
        $propiedades = Propiedades::activas()
            ->when($query, function ($qBuilder) use ($query) {
                return $qBuilder->where(function ($subQuery) use ($query) {
                    $subQuery->where('titulo', 'LIKE', "%{$query}%")
                             ->orWhere('ubicacion', 'LIKE', "%{$query}%");
                });
            })
            ->latest()
            ->get();

        // Retornamos los datos estructurados en formato JSON
        return response()->json($propiedades);
    }

    /**
     * Reglas compartidas por store y update.
     */
    private function reglasValidacion(): array
    {
        return [
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'ubicacion'    => 'required|string|max:255',
            'precio_noche' => 'required|numeric|min:0',
            'habitaciones' => 'required|integer|min:1',
            'imagen_url'   => 'required|url',
        ];
    }
}
