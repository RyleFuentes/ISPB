<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ISPB' }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="/bootstrap-5.3.2-dist/css/bootstrap.css">
        <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    </head>
    <body>
        @auth
            @include('layout.navbar')
            @include('layout.sidebar')
        @endauth

        {{$slot}}
        
    </body>
</html>
