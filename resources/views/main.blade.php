<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('css/fonts.css') }}" />
        @stack('stylesheets')
    </head>
    <body class="min-vh-100 d-flex flex-column">

        @section('menu')
            @include('menu.menu')
        @show

        @yield('content')

        @section('footer')
            @include('footer.footer')
        @show

        @stack('scripts')
    </body>
</html>
