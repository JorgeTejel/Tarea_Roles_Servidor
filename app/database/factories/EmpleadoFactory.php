<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empleado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $idiomas =['Inglés', 'Francés', 'Alemán', 'Rumano', 'Portugués'];
        $titulos =['Bach', 'Ciclo Medio', 'Ciclo Superior', 'Ingeniería', 'Licenciatura'];
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'titulo' => $this->faker->randomElement($titulos),

            //
            //
        ];
    }
}
