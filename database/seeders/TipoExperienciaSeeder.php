<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoExperiencia;

class TipoExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoExperiencia1 = TipoExperiencia::create([
            'nombre' => 'Estudios Primarios'
        ]);

        $tipoExperiencia2 = TipoExperiencia::create([
            'nombre' => 'Estudios Universitarios'
        ]);

        $tipoExperiencia3 = TipoExperiencia::create([
            'nombre' => 'Prácticas'
        ]);

        $tipoExperiencia4 = TipoExperiencia::create([
            'nombre' => 'Trabajos'
        ]);
    }
}
