<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoExperiencia;
use Illuminate\Support\Facades\DB;

class TipoExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_experiencias')->delete();
        DB::statement("DELETE FROM sqlite_sequence WHERE name='tipos_experiencias'");

        TipoExperiencia::create(['nombre' => 'Laboral']);
        TipoExperiencia::create(['nombre' => 'Profesional']);
        TipoExperiencia::create(['nombre' => 'Educativo']);
        TipoExperiencia::create(['nombre' => 'Cultural']);
    }
}
