<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LQDI Test</title>
    </head>
    <body class="antialiased">
        <div id="app">
            <lead-page-view/>
        </div>
         @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </body>
</html>
