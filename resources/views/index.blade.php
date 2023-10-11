<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ISPB' }}</title>
        <link rel="stylesheet" href="/bootstrap-5.3.2-dist/css/bootstrap.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        @auth
            @include('layout.sidebar')
        @endauth

        <div class="container">
            {{$slot}}
        </div>
        
        <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    </body>
</html>
