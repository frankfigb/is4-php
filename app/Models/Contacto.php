<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

   public function tiposContactos()
   {
       return $this->belongsTo(TiposContactos::class);
   }

   public function datosPersonales()
   {
       return $this->belongsTo(DatosPersonales::class);
   }
}
