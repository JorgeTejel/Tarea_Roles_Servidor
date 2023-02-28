<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Idioma;
use Illuminate\Support\Arr;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //
        //Cada empleado hablará entre 1 y 6 idiomas
        \App\Models\Empleado::factory()->count(30)->create()
            ->each(function ($empleado){
                $idiomas=['Francés', 'Alemán', 'Inglès',
                    'Catalán', 'Gallego','Vasco',
                    'Portugués','Rumano','Árabe','Checo','Polaco'
                ];
                $n=rand(1,6);
                $hablados = Arr::random($idiomas,$n);
                foreach ($hablados as $idioma){
                    $Idioma_fila = new Idioma();
                    $Idioma_fila->idioma=$idioma;
                    $Idioma_fila->empleado_id = $empleado->id;
                    $Idioma_fila->save();
                }
            });

        ;

    }
}
