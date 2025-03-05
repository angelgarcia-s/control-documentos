<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materiales')->insert([
            ['nombre' => 'Polietileno'],
            ['nombre' => 'Cartón Corrugado'],
            ['nombre' => 'Caple 22 pts'],
            ['nombre' => 'BOPP'],
        ]);
    }
}
