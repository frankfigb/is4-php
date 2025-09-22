<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    protected $fillable = [
        'tipo_imagen_id',
        'dato_personal_id',
        'url'
    ];

    public function tipoImagen()
    {
        return $this->belongsTo(TipoImagen::class, 'tipo_imagen_id');
    }

    public function datosPersonales()
    {
        return $this->belongsTo(DatoPersonal::class, 'dato_personal_id');
    }
}
