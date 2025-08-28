<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoImagen;

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
        
        $tipoImagen3 = TipoImagen::create([
            'nombre' => 'Imagen de Banner'
        ]);

        $tipoImagen4 = TipoImagen::create([
            'nombre' => 'Imagen de Fondo'
        ]);
    }
}
