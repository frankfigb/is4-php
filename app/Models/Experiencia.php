<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experiencia extends Model
{
    //
    protected $table = "experiencias";

    public function dato_personal(): BelongsTo {
        return $this->belongsTo(DatoPersonal::class,
        'dato_personal_id', 
        'id');
    }

    public function tipo_experiencia(): BelongsTo {
        return $this->belongsTo(TipoExperiencia::class,
        'tipo_experiencia_id', 
        'id');
    }
}
