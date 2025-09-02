<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contacto extends Model
{
    //
    protected $table = "contactos";


    public function dato_personal(): BelongsTo {
        return $this->belongsTo(DatoPersonal::class, 
        'dato_personal_id', 
        'id');
    }

    public function tipo_contacto(): BelongsTo {
        return $this->belongsTo(DatoPersonal::class, 
        'tipo_contacto_id', 
        'id');
    }
}
