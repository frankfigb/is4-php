<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoContacto extends Model
{
    //
    protected $table = "tipos_contactos";

    public function contactos(): HasMany {
        return $this->hasMany(Contacto::class, 
        'tipo_contacto_id', 
        'id');
    }
}
