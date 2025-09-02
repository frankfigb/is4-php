<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perfil extends Model
{
    //
    protected $table = "perfiles";
 
    public function dato_personal (): BelongsTo {
        return $this->belongsTo(DatoPersonal::class,
        'dato_personal_id', 
        'id');
    }
}
