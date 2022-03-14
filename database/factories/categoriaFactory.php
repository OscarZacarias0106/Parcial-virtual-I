<?php

namespace Database\Factories;

use App\Models\categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class categoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $categoria = categoria::class;

    public function definition()
    {
        return [
            'descripcion' =>$this->faker->cityPrefix,
        ];
    }
}
