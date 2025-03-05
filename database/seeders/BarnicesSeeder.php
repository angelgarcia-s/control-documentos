<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarnicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barnices')->insert([
            ['nombre' => 'UV'],
            ['nombre' => 'Acrílico'],
            ['nombre' => 'Mate'],
            ['nombre' => 'Brillante'],
        ]);
    }
}
