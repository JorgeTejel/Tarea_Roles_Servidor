<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
           user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Empresas')}}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    @vite(["resources/css/app.css","resources/js/app.js" ])

    {{--    <script src='https://kit.fontawesome.com/a076d05399.js'></script>--}}
</head>
<body class="container mx-auto w-screen bg-white">

{{--@role("administrador")
    <h1>Administrador</h1>
@endrole--}}

<div id="app">
    <x-layout.cabecera class="h-15v">
    </x-layout.cabecera >
    <nav class="h-10v ">
        @yield ("menu")
    </nav>
    <main class="container w-screen  bg-gray-50 h-65v">
        @yield("contenido")
    </main>
    <x-layout.footer class="h-10v">

    </x-layout.footer>
</div>
</body>
</html>
