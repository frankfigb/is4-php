<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoHabilidad extends Model
{
    //
    protected $table = "tipos_habilidades";

    public function habilidades(): HasMany {
        return $this->hasMany(Habilidad::class, 
        'tipo_habilidad_id', 
        'id');
    } 
}
