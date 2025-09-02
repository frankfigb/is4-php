<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    protected $table = "clientes";
    //cada cliente pertenece a un dato personal
    public function dato_personal(): BelongsTo {
        return $this->belongsTo(DatoPersonal::class,
        'dato_personal_id',
        'id');

    }


    public function comentario(): HasOne{
        return $this->hasOne(Comentario::class,
        'cliente_id',
        'id');
    }

}
