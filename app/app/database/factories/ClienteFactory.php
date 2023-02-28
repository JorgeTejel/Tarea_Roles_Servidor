<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dni = $this->faker->randomNumber(8);
        $letras =['T','R','	W','A','G','M','Y','F','P',
            'D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
        $pos = $dni%22;
        $dni = "dni-".$letras[$pos];
        $tipo_cliente=['Crédito', 'Contado'];
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'localidad'=>$this->faker->address,
            'dni'=> $dni,
            'tipo_cliente'=> $this->faker->randomElement($tipo_cliente)//S
            //
        ];
    }
}
