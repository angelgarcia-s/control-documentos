<?php

namespace Database\Factories;

use App\Models\FamiliaProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamiliaProductoFactory extends Factory
{
    protected $model = FamiliaProducto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
        ];
    }
}