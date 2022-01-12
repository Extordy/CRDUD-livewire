<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livewire</title>

        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <!-- agregar estilos livewire-->
        @livewireStyles
    </head>
    <body>
        <!-- crear seccion content -->
            @yield('content')
        
        
        <!--agregar scrip de livewire -->
        @livewireScripts
    </body>
</html>
