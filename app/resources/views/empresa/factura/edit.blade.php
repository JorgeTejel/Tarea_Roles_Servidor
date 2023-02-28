@extends ("layout");
@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('main')}}" class="mx-2">Volver</x-form.a_href>

    </x-layout.menu>
@endsection
@section("contenido")
    <fieldset class=" p-5 mx-30 border border-yellow-800 w-1/2">
        <legend class="text-4xl text-blue-400">Datos de la factura <span class="text-blue-900">{{$factura->id}}</span></legend>
    <form   class="text-3xl" action="{{route('facturas.update',[$factura])}}" method="POST">
        @method('PUT')
        @csrf
        <label for="pedido">Número de factura</label>
        <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="id"
               disabled value="{{$factura->id}} "><br />
        <label for="pedido">Pedido</label>
        <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="pedido"
               value="{{$factura->pedido}}"><br />
        <label for="pedido">Producto</label>
        <input class="border m-2 border-green-800 text-3xl text-blue-700"type="text" name="producto"
               value="{{$factura->producto}}"><br />

        <br />
        <label for="pedido">Unidades</label>
        <input class="border m-2 border-green-800 text-3xl text-blue-700" type="number"  step="0.01" name="unidades"
               value="{{$factura->unidades}}"><br />
        <label for="pedido">Precio base</label>
        <input class="border m-2 border-green-800 text-3xl text-blue-700" type="number"  step="0.01" name="precio_base"
               value="{{$factura->precio_base}}"><br />
        <label for="pedido">total</label>
        <input class="border m-2 border-green-800 text-3xl text-blue-700" type="number" step="0.01" name="total"
               value="{{$factura->total}}"><br />
        <div class="flex flex-row w-40v justify-start">
            <label for="pedido">Cliente/s para esta factura</label><br/>
            <select multiple class="border m-2 border-green-800 text-3xl text-blue-700" name="clientes[]" id="">
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->cliente_id}}">{{$cliente->cliente_id}}</option>
                @endforeach
            </select>
        </div>


        <input  class="border m-2 border-green-800 text-3xl text-blue-700" type="submit" value="Actualizar">
    </form>
    </fieldset>
@endsection
