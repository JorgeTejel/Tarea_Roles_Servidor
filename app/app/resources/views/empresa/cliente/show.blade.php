@extends ("layout");
@section("menu")
    <x-layout.menu class="justify-start">
        <x-form.a_href href="{{route('main')}}" class="mx-2">Volver a página inicial</x-form.a_href>
        <x-form.a_href href="{{route('main')}}" class="mx-2">Volver listado de clientes</x-form.a_href>
        <x-form.a_href href="{{route('facturas.create')}}" class="mx-2">Ver factuas del cliente
            <span class="ml-3 text-2xl text-red-300"> {{$cliente->id}}</span>
        </x-form.a_href>
        <x-form.a_href href="{{route('facturas.create')}}" class="mx-2">Editar </x-form.a_href>
        <x-form.a_href href="{{route('facturas.create')}}" class="mx-2">Borrar </x-form.a_href>

    </x-layout.menu>
@endsection
@section("contenido")
    <fieldset>
        <legend>Datos de cliente {{$cliente->nombre}}</legend>
        ID  {{$cliente->id}}<br />
        DNI   {{$cliente->dni}}<br />
        Nombre  {{$cliente->nombre}}<br />
        Dirección  {{$cliente->direccion}}<br />
        Teléfono  {{$cliente->telefono}}<br />
        Localidad  {{$cliente->localidad}}<br />
        Tipo de cliente  {{$cliente->tipo_cliente}}<br />
    </fieldset>

@endsection
