<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    public function tipoImagen(){
        return $this->belongsTo(TipoImagen::class, 'tipo_imagen_id');
    }

    public function datosPersonales(){
        return $this->belongsTo(DatoPersonal::class);
    }
}
