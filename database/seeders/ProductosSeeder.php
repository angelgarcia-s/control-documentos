<?php
namespace Database\Seeders;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        Producto::factory()->count(50)->create();
    }
}