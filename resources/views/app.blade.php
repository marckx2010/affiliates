<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Let's pull in some leaflet for some map fun -->
        <link rel="stylesheet" href="https://npmcdn.com/leaflet@1.3.4/dist/leaflet.css"/>
        <script src="https://npmcdn.com/leaflet@1.3.4/dist/leaflet.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-mouse-position@1.2.0/src/L.Control.MousePosition.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/leaflet-mouse-position@1.2.0/src/L.Control.MousePosition.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/maneoverland/leaflet.WorldMiniMap@1.0.0/dist/Control.WorldMiniMap.js" integrity="sha512-PFw8St3qenU1/dmwCfiYYN/bRcqY1p3+sBATR+rZ6622eyXOk/8izVtlmm/k8qW7KbRIJsku838WCV5LMs6FCg==" crossorigin=""></script>

        <!-- Scripts -->
        @vite(['resources/js/app.js', "resources/css/app.css" ,"resources/sass/app.scss", "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased bg-gray-400">
        @inertia
    </body>
    <style>
        body {
            margin: 2% 15% 15% 10%;
        }
    </style>
</html>
