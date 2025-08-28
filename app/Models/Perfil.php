<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';

    public function datosPersonales()
    {
        return $this->hasOne(DatosPersonales::class);
    }
}
