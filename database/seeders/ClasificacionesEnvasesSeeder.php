<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificacionesEnvasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clasificaciones_envases')->insert([
            ['nombre' => 'Primario'],
            ['nombre' => 'Secundario'],
            ['nombre' => 'Terciario'],
            ['nombre' => 'Cuaternario'],
            ['nombre' => 'Master'],
        ]);
    }
}
