<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        @include('site.templates._partials.topo')
        @yield('conteudo')
    </body>

</html>
