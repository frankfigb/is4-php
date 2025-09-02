<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoContacto;

class TipoContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoContacto::create(['nombre' => 'Email']);
        TipoContacto::create(['nombre' => 'Whatsapp']);
        TipoContacto::create(['nombre' => 'Instagram']);
        TipoContacto::create(['nombre' => 'X']);
        TipoContacto::create(['nombre' => 'LinkedIn']);
    }
}
