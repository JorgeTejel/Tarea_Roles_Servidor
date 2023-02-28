@extends ("layout")

@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('empleados.index')}}" class="mx-2">Volver</x-form.a_href>
    </x-layout.menu>
@endsection

@section("contenido")
    <fieldset class=" p-5 m-40 border border-yellow-800 w-1/2">
        <legend> Editar empleado {{$empleado->id}} </legend>
    <form   class="text-3xl" action="{{route('empleados.update', $empleado->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="id">ID</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="id"
                   disabled value="{{$empleado->id}} "><br />
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="nombre"
                   value="{{$empleado->nombre}}"><br />
        </div>
        <div>
            <label for="telefono">Teléfono</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="telefono"
                   value="{{$empleado->telefono}}"><br />
        </div>
        <div>
            <label for="direccion">Dierección</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="direccion"
                   value="{{$empleado->direccion}}"><br />
        </div>
        <div>
            <label for="titulo">Título</label>
            <input class="border m-2 border-green-800 text-3xl text-blue-700" type="text" name="titulo"
                   value="{{$empleado->titulo}}"><br />
        </div>

        <input  class="border m-2 border-green-800 text-3xl text-blue-700" type="submit" value="Editar">
    </form>
    </fieldset>
@endsection
