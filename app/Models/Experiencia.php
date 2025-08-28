<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experiencia extends Model
{
    protected $table = 'experiencias';

    public function tiposExperiencias(): BelongsTo
    {
        return $this->belongsTo(TiposExperiencias::class);
    }

    public function datosPersonales(): BelongsTo
    {
        return $this->belongsTo(DatosPersonales::class);
    }
}
