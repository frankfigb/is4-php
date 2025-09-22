<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'dato_personal_id',
        'titulo',
        'descripcion',
        'imagen_icono', // ← este campo es clave para que se guarde
    ];

    public function datoPersonal()
    {
        return $this->belongsTo(DatoPersonal::class, 'dato_personal_id');
    }
}
