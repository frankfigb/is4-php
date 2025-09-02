<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habilidad extends Model
{
    //
    protected $table = "habilidades";

    public function dato_personal(): BelongsTo{
        return $this->belongsTo(DatoPersonal::class, 
        'dato_personal_id', 
        'id');
    }

    public function tipo_habilidad(): BelongsTo {
        return $this->belongsTo(TipoHabilidad::class,
        'tipo_habilidad_id', 
        'id');
    }
}

