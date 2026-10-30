<?php

namespace App\Http\Controllers;

use App\Models\Propiedades;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión para poder realizar una reserva.');
        }

        // Primero validamos la propiedad para poder usar sus datos en el resto
        // de reglas (máximo de huéspedes) y evitar reservar propiedades inactivas.
        $request->validate([
            'propiedad_id' => 'required|exists:propiedades,id',
        ]);

        $propiedad = Propiedades::activas()->find($request->propiedad_id);

        if (! $propiedad) {
            return back()->withErrors([
                'propiedad_id' => 'La propiedad seleccionada ya no está disponible.',
            ])->withInput();
        }

        $maxHuespedes = $propiedad->habitaciones * 2;

        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'email_cliente'  => 'required|email|max:255',
            'fecha_inicio'   => 'required|date|after_or_equal:today',
            'fecha_fin'      => 'required|date|after:fecha_inicio',
            'huespedes'      => 'required|integer|min:1|max:'.$maxHuespedes,
        ], [
            'huespedes.max' => "Esta propiedad admite un máximo de {$maxHuespedes} huéspedes.",
        ]);

        $inicio = Carbon::parse($request->fecha_inicio)->startOfDay();
        $fin    = Carbon::parse($request->fecha_fin)->startOfDay();

        // Evitamos reservas superpuestas para la misma propiedad.
        $existeSolapamiento = Reserva::where('propiedad_id', $propiedad->id)
            ->where('estado', '!=', 'cancelada')
            ->where('fecha_inicio', '<', $fin->toDateString())
            ->where('fecha_fin', '>', $inicio->toDateString())
            ->exists();

        if ($existeSolapamiento) {
            return back()->withErrors([
                'fecha_inicio' => 'Las fechas seleccionadas ya están ocupadas. Por favor elige otro rango.',
            ])->withInput();
        }

        $noches = (int) $inicio->diffInDays($fin);

        $totalPago = $noches * $propiedad->precio_noche;

        Reserva::create([
            'propiedad_id'  => $request->propiedad_id,
            'user_id'       => Auth::id(),
            'nombre_cliente' => $request->nombre_cliente,
            'email_cliente' => $request->email_cliente,
            'fecha_inicio'  => $inicio->toDateString(),
            'fecha_fin'     => $fin->toDateString(),
            'huespedes'     => $request->huespedes,
            'total_pago'    => $totalPago,
            'estado'        => 'confirmada',
        ]);

        return redirect()->route('propiedades.show', $request->propiedad_id)
            ->with('exito', "Reserva realizada con éxito. Total a pagar: $$totalPago USD por $noches noche(s).");
    }

    public function misReservas()
    {
        $reservas = Reserva::where('user_id', Auth::id())
                        ->with('propiedad')
                        ->latest()
                        ->get();

        return view('reservas.index', compact('reservas'));
    }
}
