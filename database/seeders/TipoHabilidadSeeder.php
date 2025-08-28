<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoHabilidad;

class TipoHabilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $tipoHabilidad1 = TipoHabilidad::create([
            'nombre' => 'CSS'
        ]);

        $tipoHabilidad2 = TipoHabilidad::create([
            'nombre' => 'HTML'
        ]);

        $tipoHabilidad3 = TipoHabilidad::create([
            'nombre' => 'JavaScript'
        ]);

        $tipoHabilidad4 = TipoHabilidad::create([
            'nombre' => 'Python'
        ]);
    }
}
