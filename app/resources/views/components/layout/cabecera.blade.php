<header {{ $attributes->merge(['class'=>"
            flex flex-row justify-between  items-center
            bg-gradient-to-b bg-yellow-500"])
 }}>
    <img src="{{asset("images/logo.png")}}" class="p-4 max-h-full rounded-3xl" alt="Logo de empresa"/>
    <h1 class="text-8xl text-blue-900 ">Nombre de empresa</h1>
    <div class="flex flex-col justify-center ">
        @auth
            <span class="text-xl text-blue-500"> Logueado como {{auth()->user()->name}}</span>
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <x-button>
                    Logout
                </x-button>
            </form>
        @endauth
        @guest

            <x-form.a_href class="my-1" href="{{route('login')}}">Login</x-form.a_href>
            <x-form.a_href class="my-1" href="{{route('register')}}">Registrase</x-form.a_href>
        @endguest
    </div>
</header>
