<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\cliente_factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;


class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::All();
        $campos = $facturas[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);
        $campos = ["Número factura", "Pedido", "Producto", "Unidades",
            "Precio", "Importe total"];
        return view("empresa.factura.listado", ['filas' => $facturas, 'campos' => $campos]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clientes = Cliente::All('id');
        return view('empresa.factura.create', ['clientes' => $clientes]);
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
        $factura = new Factura ($request->input());
        $clientes = $request->input('clientes.*');
        $factura->saveOrFail();
        $facturas = Factura::All();
        //Ahora guardamos los clientes en la tabla factura cliente
        foreach ($clientes as $cliente) {
            $facturaCliente = new cliente_factura();
            $facturaCliente->cliente_id = $cliente;
            $facturaCliente->factura_id = $factura->id;
            $facturaCliente->saveOrFail();
        }
        return redirect()->route('factura.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {

        $clientes = cliente_factura::where("factura_id", $factura->id)
                                    ->get('cliente_id');


        return view('empresa.factura.edit', ['factura' => $factura, 'clientes'=>$clientes]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
//        $factura->fill($request->input())->saveOrFail();
//        return redirect()->route('factura.index');

        //
        $factura->update($request->input());

        $facturas = Factura::All();
        $campos = $facturas[0]->getAttributes();
        unset ($campos['created_at']);
        unset ($campos['updated_at']);
        $campos = array_keys($campos);
        return view("empresa.factura.listado", ['filas'=>$facturas, 'campos'=>$campos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Factura $factura)
    {
        $factura->delete();
        $facturas = Factura::all();
        info("antes de validar", []);


            return (response()->json($facturas));

//        return redirect()->route('factura.index');
        //
    }
}
