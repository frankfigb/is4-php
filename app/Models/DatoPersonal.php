<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DatoPersonal extends Model
{
    protected $table = "datos_personales";
    //dato personal tiene muchos clientes

    public function clientes(): HasMany {
        return $this->hasMany(Cliente::class, 
        'dato_personal_id', 
        'id');
    }


    public function contactos(): HasMany {
        return $this->hasMany(Contacto::class, 
        'dato_personal_id', 
        'id');
    }    

    public function experiencias(): HasMany {
        return $this->hasMany(Experiencia::class, 
        'dato_personal_id', 
        'id');
    }  

    public function habilidades(): HasMany {
        return $this->hasMany(Habilidad::class, 
        'dato_personal_id', 
        'id');
    }  

    public function imagenes(): HasMany {
        return $this->hasMany(Imagen::class, 
        'dato_personal_id', 
        'id');
    }  

    public function perfil (): HasOne {
        return $this->hasOne(Perfil::class,
        'dato_personal_id', 
        'id');
    }
}
