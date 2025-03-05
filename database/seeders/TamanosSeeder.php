<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tamanos')->insert([
            ['nombre' => 'Chico'],
            ['nombre' => 'Mediano'],
            ['nombre' => 'Grande'],
            ['nombre' => 'XL'],
        ]);
    }
}
