<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $tipoImagen1 = TipoImagen::create([
            'nombre' => 'Imagen de Portafolio'
        ]);

         $tipoImagen2 = TipoImagen::create([
            'nombre' => 'Imagen de Perfil'
        ]);
        
    }
}
