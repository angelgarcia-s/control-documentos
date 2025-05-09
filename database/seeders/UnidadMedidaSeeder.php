<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unidades_medida')->insert([
            ['nombre' => 'Caja'],
            ['nombre' => 'Bolsa'],
            ['nombre' => 'Junior'],
        ]);
    }
}
