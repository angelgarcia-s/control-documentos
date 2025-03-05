<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEmpaqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_empaque')->insert([
            ['nombre' => 'Primario'],
            ['nombre' => 'Secundario'],
            ['nombre' => 'Terciario'],
            ['nombre' => 'Cuaternario'],
            ['nombre' => 'Master'],
        ]);
    }
}
