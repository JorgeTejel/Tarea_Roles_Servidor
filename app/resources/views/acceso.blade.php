
@extends ("layout")
@section("menu")
    <x-layout.menu class="justify-start h-full">
{{--                <h1>Rol: -{{auth()->user()->roles()->get()}}-</h1>--}}

    @hasanyrole("administrador|gestor")
        <x-form.a_href href="{{route('empleados.index')}}" class="mx-2">Empleados</x-form.a_href>
    @endhasanyrole

    @hasanyrole("administrador|gestor|comercial")
        <x-form.a_href href="{{route('clientes.index')}}" class="mx-2">Clientes</x-form.a_href>
    @endhasanyrole

    @hasanyrole("administrador|gestor|comercial")
        <x-form.a_href href="{{route('facturas.index')}}" class="mx-2">Facturas</x-form.a_href>
    @endhasanyrole

{{--        @role("administrador")--}}
{{--            <x-form.a_href href="{{route('roles')}}" class="mx-2">Roles</x-form.a_href>--}}
{{--        @endrole--}}
    </x-layout.menu>
@endsection

@section("contenido")
    <div class="max-h-full flex flex-row justify-center bg-gray-300">
        <img src="{{asset("images/uml.png")}}" alt="uml">
    </div>
@endsection

