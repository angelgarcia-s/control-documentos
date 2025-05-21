<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpaquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empaques')->insert([
            ['nombre' => 'Bolsa'],
            ['nombre' => 'Caja'],
            ['nombre' => 'Master'],
        ]);
    }
}
