<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $clientes = Cliente::All('id');
        $precio_base=$this->faker->randomFloat(2,50,10000); //No tenemos tabla de pedidios
        return [
        'pedido' => $this->faker->numberBetween(1,1000), //No tenemos tabla de pedidios
        'producto'=> "P-".$this->faker->numberBetween(1,1000), //No tenemos tabla de productos
        'unidades'=>$this->faker->numberBetween(1,100), //No tenemos tabla de pedidios
        'precio_base'=>$precio_base,
        'total'=>$precio_base*1.21
    //
        ];
    }
}
