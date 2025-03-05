<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliaProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('familia_productos')->insert([
            ['nombre' => 'PLUS'],
            ['nombre' => 'CONFORT'],
            ['nombre' => 'EXTRA'],
        ]);
    }
}
