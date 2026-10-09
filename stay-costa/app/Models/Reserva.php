<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'propiedad_id',
        'nombre_cliente',
        'email_cliente',
        'fecha_inicio',
        'fecha_fin',
        'huespedes',
        'total_pago',
        'estado'

    ];

    public function propiedad()
    {
        return $this->belongsTo(Propiedades::class, 'propiedad_id');
    }
}
