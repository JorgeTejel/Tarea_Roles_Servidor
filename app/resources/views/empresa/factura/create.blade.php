@extends ("layout")
@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('main')}}" class="mx-2">Volver</x-form.a_href>
    </x-layout.menu>
@endsection
@section("contenido")
    <fieldset class=" p-5 mx-30 border border-yellow-800 w-1/2">
        <legend class="text-4xl text-blue-400">Nueva factura</legend>



        <form class="text-3xl" action="{{route('facturas.store')}}" method="POST">
            @csrf
            <label for="pedido">Pedido</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="pedido"><br/>
            <label for="pedido">Producto</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="producto"><br/>
            <label for="pedido">Unidades</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="number" name="unidades"><br/>
            <label for="pedido">Precio base</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="number" name="precio_base"><br/>
            <label for="pedido">Total</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="number" name="total"><br/>


            <div class="flex flex-row w-40v justify-start">
                <label for="pedido">Cliente/s para esta factura</label><br/>
                <select multiple class="border m-2 border-green-800 text-3xl text-blue-700" name="clientes[]" id="">
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->id}}</option>
                    @endforeach
                </select>
            </div>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="submit" value="Guardar">
        </form>

    </fieldset>
@endsection
