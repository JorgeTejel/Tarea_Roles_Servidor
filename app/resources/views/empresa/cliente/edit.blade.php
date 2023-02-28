@extends ("layout")

@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('clientes.index')}}" class="mx-2">Volver</x-form.a_href>
    </x-layout.menu>
@endsection

@section("contenido")
    <fieldset class=" p-5 m-40 border border-yellow-800 w-1/2">
        <legend> Editar cliente {{$cliente->id}} </legend>
        <form   class="text-3xl" action="{{route('clientes.update', $cliente->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="id">ID</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="id"
                       disabled value="{{$cliente->id}} "><br />
            </div>
            <div>
                <label for="nombre">Nombre</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="nombre"
                       value="{{$cliente->nombre}}"><br />
            </div>
            <div>
                <label for="telefono">Teléfono</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="telefono"
                       value="{{$cliente->telefono}}"><br />
            </div>
            <div>
                <label for="direccion">Dierección</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="direccion"
                       value="{{$cliente->direccion}}"><br />
            </div>
            <div>
                <label for="localidad">Localidad</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="localidad"
                       value="{{$cliente->localidad}}"><br />
            </div>
            <div>
                <label for="dni">DNI</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="dni"
                       value="{{$cliente->dni}}"><br />
            </div>
            <div>
                <label for="tipo">Tipo cliente</label>
                <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="tipo"
                       value="{{$cliente->tipo_cliente}}"><br />
            </div>

            <input  class="border m-2 border-green-800 text-3xl text-blue-700" type="submit" value="Editar">
        </form>
    </fieldset>
@endsection
