<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $table = 'habilidades';

    public function tiposHabilidades()
    {
        return $this->belongsTo(TiposHabilidades::class);
    }

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
}
