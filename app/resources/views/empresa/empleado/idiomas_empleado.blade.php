@extends ("layout")

@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('empleados.index')}}" class="mx-2">Volver</x-form.a_href>
    </x-layout.menu>
@endsection

@section("contenido")
    <fieldset class=" p-5 m-40 border border-yellow-800 w-1/2">
        <h1>Idiomas del empleado {{$empleado->nombre}}</h1>
        <tabla rol="" consulta="" filas_serializadas='@json($filas)' campos_serializados='@json($campos)' nombre_tabla="Idiomas"></tabla>
    </fieldset>
@endsection
