<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaDeProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('familia_de_productos')->insert([
            ['nombre' => 'PLUS'],
            ['nombre' => 'CONFORT'],
            ['nombre' => 'EXTRA'],
        ]);
    }
}
