<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoImagen extends Model
{
    //
    protected $table = "tipos_imagenes";

    public function imagenes(): HasMany {
        return $this->hasMany(Imagen::class, 
        'tipo_imagen_id', 
        'id');
    } 
}
