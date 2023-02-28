<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();

        $campos = $clientes[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);
        return view("empresa.cliente.listado",['filas'=>$clientes, 'campos'=>$campos]);
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view("empresa.cliente.show",["cliente"=>$cliente]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        return view("empresa.cliente.edit", ['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $cliente->update($request->input());

        $clientes = Cliente::All();
        $campos = $clientes[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);
        return view("empresa.cliente.listado", ['filas'=>$clientes, 'campos'=>$campos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $solicitud ,Cliente $cliente)
    {
        $cliente->delete();

        $clientes = Cliente::all();
        return  (response()->json($clientes));
    }
}
