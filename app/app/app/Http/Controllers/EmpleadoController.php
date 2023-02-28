<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Idioma;
use Illuminate\Http\Request;
use App\Http\Controllers\IdiomaController;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::All();
        $campos = $empleados[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);
        $rol = auth()->user()->getRoleNames()[0]; // Conseguir el rol del usuario que se ha logueado y está viendo el listado de empleados
        // dd($rol);
        return view("empresa.empleado.listado", ['filas' => $empleados, 'campos' => $campos, 'rol'=>$rol]);

//        // Para ver las filas en páginas (no todos a la vez)
//        $empleados = Empleado::paginate(10);
//        return view("empresa.empleado.listado1", ['filas'=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        return view("empresa.empleado.edit", ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $empleado->update($request->input());

        $empleados = Empleado::All();
        $campos = $empleados[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);
        return view("empresa.empleado.listado", ['filas' => $empleados, 'campos' => $campos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();

        $empleados = Empleado::All();
        return (response()->json($empleados));
    }

    public function get_idiomas(int $id) {
        // Encontrar el id del empleado
        $empleado = Empleado::where("id", $id)->first();
        // dd($empleado);

        // Capturar los idiomas donde empleado_id es el id del empleado que recibe la función
        $idiomas = Idioma::where('empleado_id', $empleado->id)->get();
        // dd($idiomas);

        $campos = $idiomas[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);

        return view("empresa.empleado.idiomas_empleado", ['empleado'=>$empleado, 'filas'=>$idiomas, 'campos'=>$campos]);
    }
}
