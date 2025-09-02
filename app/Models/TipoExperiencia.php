<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoExperiencia extends Model
{
    //
    protected $table = "tipos_experiencias";
    
    public function experiencias(): HasMany {
        return $this->hasMany(Experiencia::class, 
        'tipo_experiencia_id', 
        'id');
    } 
}
