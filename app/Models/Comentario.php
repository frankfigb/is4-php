<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    //
    protected $table = "comentarios";

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class,
        'cliente_id',
        'id');
    }
    
}
