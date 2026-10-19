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
        if (!Auth::check()){
            return redirect()->route('login')
            ->with('error', 'Debes iniciar sesión para poder realizar una reserva.');
        }
    
        $request->validate([
            'propiedad_id' => 'required|exists:propiedades,id',
            'nombre_cliente' => 'required|string|max:255',
            'email_cliente' => 'required|email|max:255',
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'huespedes' => 'required|integer|min:1',
        ]);

        $propiedad = Propiedades::findOrFail($request->propiedad_id);

        $incio = Carbon::parse($request->fecha_inicio);
        $fin = Carbon::parse($request->fecha_fin);  

        $noches = $incio->diffInDays($fin);

        $totalPago = $noches * $propiedad->precio_noche;

        Reserva::create([
            'propiedad_id' => $request->propiedad_id,
            'user_id' => Auth::id(),
            'nombre_cliente' => $request->nombre_cliente,
            'email_cliente' => $request->email_cliente,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'huespedes' => $request->huespedes,
            'total_pago' => $totalPago,
            'estado' => 'confirmada',
        ]);

        return redirect()->route('propiedades.show', $request->propiedad_id)
            ->with('exito', "Reserva realizada con éxito. Total a pagar: $$totalPago USD por $noches noche(s).");
    }   
}
