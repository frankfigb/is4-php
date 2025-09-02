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
        TipoImagen::create(['nombre' => 'Perfil']);
        TipoImagen::create(['nombre' => 'Portada']);
        TipoImagen::create(['nombre' => 'Proyecto']);
        TipoImagen::create(['nombre' => 'Certificado']);
    }
}
