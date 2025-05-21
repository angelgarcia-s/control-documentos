<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodigosBarrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('codigos_barras')->insert([
            [
                'consecutivo_codigo' => '001',
                'codigo' => '7502224240017',
                'nombre' => 'Plus',
                'clasificacion_envase' => 'Primario',
                'empaque' => 'caja',
                'contenido' => '100 unidades',
                'tipo' => 'EAN13',
                'color_id' => '1',
                'tamano_id' => '2',
                'nombre_corto' => 'Plus',
            ],
            [
                'consecutivo_codigo' => '001',
                'codigo' => '17502224240014',
                'nombre' => 'Plus',
                'clasificacion_envase' => 'Master',
                'empaque' => 'corrugado',
                'contenido' => '20 unidades',
                'tipo' => 'ITF14',
                'color_id' => '1',
                'tamano_id' => '2',
                'nombre_corto' => 'Plus',
            ],
            [
                'consecutivo_codigo' => '002',
                'codigo' => '7502224240024',
                'nombre' => 'Confort',
                'clasificacion_envase' => 'Primario',
                'empaque' => 'caja',
                'contenido' => '100 unidades',
                'tipo' => 'EAN13',
                'color_id' => '2',
                'tamano_id' => '3',
                'nombre_corto' => 'Confort',
            ],
            [
                'consecutivo_codigo' => '002',
                'codigo' => '17502224240021',
                'nombre' => 'Confort',
                'clasificacion_envase' => 'Master',
                'empaque' => 'corrugado',
                'contenido' => '20 unidades',
                'tipo' => 'ITF14',
                'color_id' => '2',
                'tamano_id' => '3',
                'nombre_corto' => 'Confort',
            ],
        ]);
    }
}
