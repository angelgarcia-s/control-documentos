<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'sku' => 'SKU-001',
                'descripcion' => 'Producto de prueba 1',
                'id_familia' => 1,
                'id_tamano' => 1,
                'id_color' => 1,
                'id_proveedor' => 1,
                'id_unidad_medida' => 1,
                'multiplos_master' => 10,
                'producto' => 'Producto A',
                'nombre_corto' => 'Producto A Rojo Chico',
                'cupo_tarima' => 50,
                'requiere_peso' => 'NO',
                'peso_gramos' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'SKU-002',
                'descripcion' => 'Producto de prueba 2',
                'id_familia' => 2,
                'id_tamano' => 2,
                'id_color' => 2,
                'id_proveedor' => 2,
                'id_unidad_medida' => 2,
                'multiplos_master' => 15,
                'producto' => 'Producto B',
                'nombre_corto' => 'ProdB Azul Mediano',
                'cupo_tarima' => 30,
                'requiere_peso' => 'SI',
                'peso_gramos' => 700,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
