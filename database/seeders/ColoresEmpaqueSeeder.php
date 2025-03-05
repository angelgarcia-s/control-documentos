<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColoresEmpaqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colores_empaque')->insert([
            ['nombre' => 'Blanco'],
            ['nombre' => 'Transparente'],
            ['nombre' => 'Azul'],
            ['nombre' => 'Verde'],
            ['nombre' => 'Rojo'],
        ]);
    }
}
