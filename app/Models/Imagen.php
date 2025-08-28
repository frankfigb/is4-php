<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    public function tiposImagenes()
    {
        return $this->belongsTo(TiposImagenes::class);
    }

    public function datosPersonales()
    {
        return $this->belongsTo(DatosPersonales::class);
    }
}
