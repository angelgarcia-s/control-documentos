<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\FamiliaProducto;
use App\Models\UnidadMedida;
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
            'sku' => $this->faker->unique()->bothify('SKU###'), // Ej. SKU123
            'descripcion' => $this->faker->sentence(3), // Ej. "Camisa de algodón suave"
            'id_categoria' => Categoria::inRandomOrder()->first()->id ?? 1, // Usa categoría existente
            'id_familia' => FamiliaProducto::inRandomOrder()->first()->id ?? 1, // Usa familia existente
            'id_tamano' => Tamano::inRandomOrder()->first()->id ?? 1, // Usa tamaño existente
            'id_color' => Color::inRandomOrder()->first()->id ?? 1, // Usa color existente
            'id_proveedor' => Proveedor::inRandomOrder()->first()->id ?? 1, // Usa proveedor existente
            'id_unidad_medida' => UnidadMedida::inRandomOrder()->first()->id ?? 1, // Usa unidad existente
            'multiplos_master' => $this->faker->numberBetween(1, 50),
            'nombre_corto' => function (array $attributes) {
                $familia = FamiliaProducto::find($attributes['id_familia']);
                $color = Color::find($attributes['id_color']);
                $tamano = Tamano::find($attributes['id_tamano']);
                return implode(' ', [
                    $familia->nombre ?? 'Sin Familia',
                    $color->nombre ?? 'Sin Color',
                    $tamano->nombre ?? 'Sin Tamaño',
                ]);
            },
            'cupo_tarima' => $this->faker->numberBetween(50, 500),
            'requiere_peso' => $this->faker->randomElement(['SI', 'NO']),
            'peso' => $this->faker->randomFloat(2, 100, 1000), // Ej. 500.75
            'variacion_peso' => $this->faker->randomFloat(2, 1, 10), // Ej. 5.25
        ];
    }
}