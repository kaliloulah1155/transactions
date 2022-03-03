<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>livewire Screencasts</title>

        <!-- Fonts -->
 
        <!-- Styles -->
        
        @livewireStyles
    </head>
    <body>
             @livewire('hello-world')

             @livewireScripts
    </body>
</html>
