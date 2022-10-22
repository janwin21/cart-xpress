<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Cart Xpress') }}</title>

        <!-- Scripts -->
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body style="background: url('{{ asset('images/backgrounds/background-2.png') }}') 
                 no-repeat center center fixed;
                 background-size: cover;">
        @inertia
        <div id="popup"></div>
        <div id="backup-popup-1"></div>
    </body>
</html>
