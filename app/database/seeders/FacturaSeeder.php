<?php

namespace Database\Seeders;

use App\Models\cliente_factura;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Illuminate\Support\Arr;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PAra cada factura
        //Se la asigno a entre 1 y 6 clientes

        \App\Models\Factura::factory()->count(10)->create()
        ->each(function ($factura){
            $n=rand(1,6);
            $clientes = Cliente::all('id');

            $clientes=Arr::random($clientes->toArray(),$n);
            foreach ($clientes as $cliente){

                $ClienteFactura = new cliente_factura();

                $ClienteFactura->factura_id = $factura->id;
                $ClienteFactura->cliente_id = $cliente['id'];
                $ClienteFactura->save();
            }
        });
    }
}
