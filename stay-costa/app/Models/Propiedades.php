<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Propiedades extends Model
{
    protected $table = 'propiedades';

    protected $fillable = [
        'titulo',
        'descripcion',
        'precio_noche',
        'ubicacion',
        'habitaciones',
        'imagen_url',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }

    /**
     * Solo propiedades publicadas (no eliminadas lógicamente).
     */
    public function scopeActivas(Builder $query): Builder
    {
        return $query->where('activo', true);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'propiedad_id');
    }
}
