<?php

namespace App\Models;

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
        'imagen_url'
    ];
}
