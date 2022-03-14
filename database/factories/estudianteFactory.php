<?php

namespace Database\Factories;

use App\Models\estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class estudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $estu = estudiante::class;

    public function definition()
    {
        $foto = ('uploads');

        return [
            'nombre' =>$this->faker->name,
            'alias' => $this->faker->lastName,
            'foto' =>$foto,
            'correo' => $this->faker->email,
            'fecha_nacimiento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'telefono' =>$this->faker->tollFreePhoneNumber,
            'id_categoria' => $this->faker->numberBetween(1,100)
        ];
    }
}
