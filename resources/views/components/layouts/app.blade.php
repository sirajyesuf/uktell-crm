<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{asset('css/custom/adminloginpage.css')}}">


    </head>

    <body>

        {{ $slot }}
        
        <script src="{{asset("js/script.js")}}"></script>
    </body>

</html>