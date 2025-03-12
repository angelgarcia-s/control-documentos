<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\FamiliaProducto;
use App\Models\Color;
use App\Models\Tamano;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->numerify('SKU-#####'),
            'producto' => $this->faker->words(3, true),
            'descripcion' => $this->faker->sentence(),
            'id_familia' => FamiliaProducto::inRandomOrder()->first()->id ?? FamiliaProducto::factory()->create()->id,
            'id_color' => Color::inRandomOrder()->first()->id ?? Color::factory()->create()->id,
            'id_tamano' => Tamano::inRandomOrder()->first()->id ?? Tamano::factory()->create()->id,
            'id_proveedor' => Proveedor::inRandomOrder()->first()->id ?? Proveedor::factory()->create()->id,
            'id_unidad_medida' => null, // Opcional, ajusta si tienes una tabla para esto
            'multiplos_master' => $this->faker->numberBetween(1, 100),
            'nombre_corto' => $this->faker->word(),
            'cupo_tarima' => $this->faker->numberBetween(10, 500),
            'requiere_peso' => $this->faker->randomElement(['SI', 'NO']),
            'peso_gramos' => $this->faker->optional()->numberBetween(100, 5000),
        ];
    }
}