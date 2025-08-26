<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoExperiencia1 = TipoExperiencia::create([
            'nombre' => 'Freelance'
        ]);

        $tipoExperiencia2 = TipoExperiencia::create([
            'nombre' => 'Tiempo Completo'
        ]);

        $tipoExperiencia3 = TipoExperiencia::create([
            'nombre' => 'Medio Tiempo'
        ]);

        $tipoExperiencia4 = TipoExperiencia::create([
            'nombre' => 'Prácticas'
        ]);
    }
}
