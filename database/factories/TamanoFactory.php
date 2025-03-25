<?php

namespace Database\Factories;

use App\Models\Tamano;
use Illuminate\Database\Eloquent\Factories\Factory;

class TamanoFactory extends Factory
{
    protected $model = Tamano::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Chico', 'Mediano', 'Grande', 'Extra Grande', 'Mini',
                'Standard', 'Jumbo', 'Compacto', 'Regular', 'Maxi']),
        ];
    }
}